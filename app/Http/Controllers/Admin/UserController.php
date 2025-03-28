<?php

namespace App\Http\Controllers\Admin;

use DB;
use Auth;
use Carbon\Carbon;
use App\Models\User;
use App\CPU\UserManager;
use App\Models\Admin\Plan;
use App\Models\BankDetail;
use App\Models\Commission;
use App\Models\UserWallet;
use App\Models\Admin\Payout;
use App\Models\PlanPurchase;
use Illuminate\Http\Request;
use App\Models\LevelUpWallet;
use Illuminate\Validation\Rule;
use App\Models\Admin\UserDetail;
use App\Http\Controllers\Controller;
use App\Models\Admin\WebsiteSetting;
use App\Models\RegistrationErrorLog;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\Admin\CommissionSetting;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\AutoUpgradeController;

class UserController extends Controller
{

    public function index(Request $request){
        $search_key = $request->search_key;
        $search_date = $request->search_date;
        $search_have_sponser  = $request->search_have_sponser;
        $search_register_from = $request->search_register_from;
        $search_commission = $request->search_commission;

        $users = UserManager::withoutTrash();
        if($search_date){
            $dates=explode('-',$search_date);
            $d1=strtotime($dates[0]);
            $d2=strtotime($dates[1]);
            $da1=date('Y-m-d',$d1);
            $da2=date('Y-m-d',$d2);
            $startDate = Carbon::createFromFormat('Y-m-d', $da1)->startOfDay();
            $endDate = Carbon::createFromFormat('Y-m-d', $da2)->endOfDay();

            $search_date=$dates[0].'-'.$dates[1];
            $users=$users->whereBetween('created_at', [$startDate, $endDate]);
        }
        if($search_have_sponser  == 'no_sponser'){
            $users=$users->whereNull('referral_code');
        }
        if($search_have_sponser  == 'have_sponser'){
            $users=$users->whereNotNull('referral_code');
        }
        if($search_register_from == 'admin' || $search_register_from == 'self'){
            $users=$users->where('added_by',$search_register_from);
        }
        if($search_commission){
            $users=$users->whereHas('userDetail', function($q) use ($search_commission){
                $q->where('total_commission','>=',$search_commission);
            });
        }
        if($search_key){
            $users=$users->where(function ($query) use ($search_key){
                $query->where('name','like','%'.$search_key.'%')
                      ->orWhere('email','like','%'.$search_key.'%')
                      ->orWhere('phone','like','%'.$search_key.'%')
                      ->orWhere('referrer_code','like','%'.$search_key.'%');
            });
        }
        $users = $users->withCount('associates')->with(['sponsorDetail','userDetail.plan'])->withSum('payout','amount')->withSum('commission','commission')->withSum('levelupCredit','amount')->withSum('levelupDebit','amount')->orderBy('id','desc')->simplePaginate(10);

        return view('admin.user.index',compact('users','search_key','search_date','search_have_sponser','search_register_from','search_commission'),['page_title'=>'Users']);
    }

    public function profile($user_id){
        $user_details = User::where('id',$user_id)->with(['sponsorDetail','bankDetail'])->withSum('payout','amount')->first();

        return view('admin.user.user_profile_model',compact('user_details'));
    }

    public function associates(Request $request){
        $search_key = $request->search_key;
        $search_date = $request->search_date;
        $associates = User::where('delete_status','0')->where('referral_code',$request->search_key);
        if($search_date)
        {
            $dates=explode('-',$search_date);
            $d1=strtotime($dates[0]);
            $d2=strtotime($dates[1]);
            $da1=date('Y-m-d',$d1);
            $da2=date('Y-m-d',$d2);
            $startDate = Carbon::createFromFormat('Y-m-d', $da1)->startOfDay();
            $endDate = Carbon::createFromFormat('Y-m-d', $da2)->endOfDay();

            $search_date=$dates[0].'-'.$dates[1];
            $associates=$associates->whereBetween('created_at', [$startDate, $endDate]);
        }
        $associates=$associates->orderBy('created_at','desc')->paginate(10);
        return view('admin.user.associates',compact('associates','search_key','search_date'),['page_title'=>'Associates']);
    }

    public function create(Request $request){
        $error_registration_user = RegistrationErrorLog::find($request->error_registration_id);

        return view('admin.user.create',compact('error_registration_user'),['page_title'=>'Add User']);
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'nullable|digits:10|unique:users',
            'state' => 'required',
            'referrer_code' => 'required|unique:users',
            'current_plan_id' => 'required',
            'payment_id' => 'required',
        ]);
        if($request->referral_code){
            $this->validate($request, [
                'referral_code' => [Rule::exists('users','referrer_code')->where('delete_status','0'),]
            ]);
        }

        $user = new User;
        $user->added_by = 'admin';
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->state = $request->state;
        $user->referrer_code = $request->referrer_code;
        $user->referral_code = $request->referral_code;
        $user->password = Hash::make($request->email);
        $user->is_old = '0';
        $user->save();

        $user_detail = new UserDetail;
        $user_detail->user_id = $user->id;
        $user_detail->current_plan_id = $request->current_plan_id;
        $user_detail->save();

        $plan = Plan::where('id',$request->current_plan_id)->first();

        $plan_purchase = new PlanPurchase;
        $plan_purchase->user_id = $user->id;
        $plan_purchase->plan_id = $plan->id;
        $plan_purchase->course_ids = $plan->course_ids;
        $plan_purchase->amount = $plan->amount;
        if($request->referral_code){
            $plan_purchase->discounted_amount = $plan->amount - $plan->discounted_price;
            $plan_purchase->total_amount = $plan->discounted_price;
            $plan_purchase->payment_detail = json_encode(['id'=>$request->payment_id,'amount'=>$plan->discounted_price]);
        }else{
            $plan_purchase->total_amount = $plan->amount;
            $plan_purchase->payment_detail = json_encode(['id'=>$request->payment_id,'amount'=>$plan->amount]);
        }
        $plan_purchase->payment_status = 'success';
        $plan_purchase->save();

        try {
            Mail::send('email.welcome_mail', ['user_name'=>$user], function($message) use ($user){
                $message->to($user->email);
                $message->subject('Welcome to  RichIND');
            });
        } catch (\Throwable $th) {
            //throw $th;
        }

        if($request->referral_code){
            $this->distributeCommission($request->referral_code,$plan->id,$plan_purchase->id,$user);
        }else{
            $commission_setting = CommissionSetting::get();
            $level = $commission_setting->count();
            for($i=1;$i<=$level;$i++){
                $commission_user = User::with('userDetail.plan')->first();
                if($commission_user->userDetail->plan->priority <= $plan->priority){
                    $commission_amount = $commission_user->userDetail->plan->commission[$i-1];
                }else{
                    $commission_amount = $plan->commission[$i-1];
                }
                $commission = new Commission;
                $commission->user_id = $commission_user->id;
                $commission->plan_purchase_id = $plan_purchase->id;
                $commission->commission = $commission_amount;
                $commission->level = $i;
                $commission->save();

                $user_wallet = new UserWallet;
                $user_wallet->user_id = $commission_user->id;
                $user_wallet->from_id = $plan_purchase->id;
                $user_wallet->amount = $commission_amount;
                $user_wallet->type = 'credit';
                if($i == 1){
                    $user_wallet->from = 'active_commission';
                }else{
                    $user_wallet->from = 'passive_commission';
                }
                $user_wallet->save();

                $user_detail = UserDetail::where('user_id',User::first()->id)->first();
                $user_detail->total_commission = $user_detail->total_commission + $commission_amount;
                $user_detail->total_wallet_balance = $user_detail->total_wallet_balance + $commission_amount;
                $user_detail->save();

                // $higher_plan = Plan::where('delete_status','0')->where('status','1')->latest('priority')->first();
                // if($higher_plan->priority > $commission_user->userDetail->plan->priority){
                //     $level_up_wallet = new LevelUpWallet;
                //     $level_up_wallet->user_id = $commission_user->id;
                //     $level_up_wallet->from_id = $commission->id;
                //     $level_up_wallet->amount = ($commission_amount*10)/100;
                //     $level_up_wallet->type = 'credit';
                //     if($i == 1){
                //         $level_up_wallet->from = 'active_commission';
                //     }else{
                //         $level_up_wallet->from = 'passive_commission';
                //     }
                //     $level_up_wallet->save();

                //     $user_wallet = new UserWallet;
                //     $user_wallet->user_id = $commission_user->id;
                //     $user_wallet->from_id = $level_up_wallet->id;
                //     $user_wallet->amount = $level_up_wallet->amount;
                //     $user_wallet->type = 'debit';
                //     $user_wallet->from = 'level_up_wallet_commission';
                //     $user_wallet->save();

                //     $user_detail = UserDetail::where('user_id',User::first()->id)->first();
                //     $user_detail->total_wallet_balance = $user_detail->total_wallet_balance - $level_up_wallet->amount;
                //     $user_detail->save();

                //     $auto_upgrade_controller = new AutoUpgradeController;
                //     $auto_upgrade_controller->upgradePlan($commission_user->id);
                // }

                if($i == 1){
                    try {
                        Mail::send('email.active_mail', ['user_name'=>$commission_user->name,'amount'=>$commission_amount], function($message) use($commission_user){
                            $message->to($commission_user->email);
                            $message->subject('RichIND Notification');
                        });
                    } catch (\Throwable $th) {
                        //throw $th;
                    }
                }else{
                    try {
                        Mail::send('email.passive_mail', ['user_name'=>$commission_user->name,'amount'=>$commission_amount,'comes_from'=>$user], function($message) use($commission_user){
                            $message->to($commission_user->email);
                            $message->subject('RichIND Notification');
                        });
                    } catch (\Throwable $th) {
                        //throw $th;
                    }
                }
            }
        }

        RegistrationErrorLog::where('email',$request->email)->delete();

        return redirect()->route('admin.user.index')->with('success','Old User Registered Successfully!');
    }

    public function distributeCommission($referral_code,$plan_id,$plan_purchase_id,$user){
        $commission_setting = CommissionSetting::get();
        $level = $commission_setting->count();
        $plan = Plan::where('id',$plan_id)->first();
        $user_arr = [];
        for($i=1;$i<=$level;$i++){
            $commission_user = User::where('referrer_code',$referral_code)->with('userDetail.plan')->first();
            if($commission_user){
                if($commission_user->userDetail->plan->priority <= $plan->priority){
                    $commission_amount = $commission_user->userDetail->plan->commission[$i-1];
                }else{
                    $commission_amount = $plan->commission[$i-1];
                }
                $commission = new Commission;
                $commission->user_id = $commission_user->id;
                $commission->plan_purchase_id = $plan_purchase_id;
                $commission->commission = $commission_amount;
                $commission->level = $i;
                $commission->save();

                $user_wallet = new UserWallet;
                $user_wallet->user_id = $commission_user->id;
                $user_wallet->from_id = $plan_purchase_id;
                $user_wallet->amount = $commission_amount;
                $user_wallet->type = 'credit';
                if($i == 1){
                    $user_wallet->from = 'active_commission';
                }else{
                    $user_wallet->from = 'passive_commission';
                }
                $user_wallet->save();

                $user_detail = UserDetail::where('user_id',$commission_user->id)->first();
                $user_detail->total_commission = $user_detail->total_commission + $commission_amount;
                $user_detail->total_wallet_balance = $user_detail->total_wallet_balance + $commission_amount;
                $user_detail->save();

                // $higher_plan = Plan::where('delete_status','0')->where('status','1')->latest('priority')->first();
                // if($higher_plan->priority > $commission_user->userDetail->plan->priority){
                //     $level_up_wallet = new LevelUpWallet;
                //     $level_up_wallet->user_id = $commission_user->id;
                //     $level_up_wallet->from_id = $commission->id;
                //     $level_up_wallet->amount = ($commission_amount*10)/100;
                //     $level_up_wallet->type = 'credit';
                //     if($i == 1){
                //         $level_up_wallet->from = 'active_commission';
                //     }else{
                //         $level_up_wallet->from = 'passive_commission';
                //     }
                //     $level_up_wallet->save();

                //     $user_wallet = new UserWallet;
                //     $user_wallet->user_id = $commission_user->id;
                //     $user_wallet->from_id = $level_up_wallet->id;
                //     $user_wallet->amount = $level_up_wallet->amount;
                //     $user_wallet->type = 'debit';
                //     $user_wallet->from = 'level_up_wallet_commission';
                //     $user_wallet->save();

                //     $user_detail = UserDetail::where('user_id',$commission_user->id)->first();
                //     $user_detail->total_wallet_balance = $user_detail->total_wallet_balance - $level_up_wallet->amount;
                //     $user_detail->save();

                //     $auto_upgrade_controller = new AutoUpgradeController;
                //     $auto_upgrade_controller->upgradePlan($commission_user->id);
                // }

                array_push($user_arr,$commission_user->id);
                $referral_code = $commission_user->referral_code;
                if($i == 1){
                    try {
                        Mail::send('email.active_mail', ['user_name'=>$commission_user->name,'amount'=>$commission_amount], function($message) use($commission_user){
                            $message->to($commission_user->email);
                            $message->subject('RichIND Notification');
                        });
                    } catch (\Throwable $th) {
                        //throw $th;
                    }
                }else{
                    try {
                        Mail::send('email.passive_mail', ['user_name'=>$commission_user->name,'amount'=>$commission_amount,'comes_from'=>$user], function($message) use($commission_user){
                            $message->to($commission_user->email);
                            $message->subject('RichIND Notification');
                        });
                    } catch (\Throwable $th) {
                        //throw $th;
                    }
                }

            }else{
                $commission_user = User::with('userDetail.plan')->first();
                if($commission_user->userDetail->plan->priority <= $plan->priority){
                    $commission_amount = $commission_user->userDetail->plan->commission[$i-1];
                }else{
                    $commission_amount = $plan->commission[$i-1];
                }
                $commission = new Commission;
                $commission->user_id = $commission_user->id;
                $commission->plan_purchase_id = $plan_purchase_id;
                $commission->commission = $commission_amount;
                $commission->level = $i;
                $commission->save();

                $user_wallet = new UserWallet;
                $user_wallet->user_id = $commission_user->id;
                $user_wallet->from_id = $plan_purchase_id;
                $user_wallet->amount = $commission_amount;
                $user_wallet->type = 'credit';
                if($i == 1){
                    $user_wallet->from = 'active_commission';
                }else{
                    $user_wallet->from = 'passive_commission';
                }
                $user_wallet->save();

                $user_detail = UserDetail::where('user_id',User::first()->id)->first();
                $user_detail->total_commission = $user_detail->total_commission + $commission_amount;
                $user_detail->total_wallet_balance = $user_detail->total_wallet_balance + $commission_amount;
                $user_detail->save();

                // $higher_plan = Plan::where('delete_status','0')->where('status','1')->latest('priority')->first();
                // if($higher_plan->priority > $commission_user->userDetail->plan->priority){
                //     $level_up_wallet = new LevelUpWallet;
                //     $level_up_wallet->user_id = $commission_user->id;
                //     $level_up_wallet->from_id = $commission->id;
                //     $level_up_wallet->amount = ($commission_amount*10)/100;
                //     $level_up_wallet->type = 'credit';
                //     if($i == 1){
                //         $level_up_wallet->from = 'active_commission';
                //     }else{
                //         $level_up_wallet->from = 'passive_commission';
                //     }
                //     $level_up_wallet->save();

                //     $user_wallet = new UserWallet;
                //     $user_wallet->user_id = $commission_user->id;
                //     $user_wallet->from_id = $level_up_wallet->id;
                //     $user_wallet->amount = $level_up_wallet->amount;
                //     $user_wallet->type = 'debit';
                //     $user_wallet->from = 'level_up_wallet_commission';
                //     $user_wallet->save();

                //     $user_detail = UserDetail::where('user_id',User::first()->id)->first();
                //     $user_detail->total_wallet_balance = $user_detail->total_wallet_balance - $level_up_wallet->amount;
                //     $user_detail->save();

                //     $auto_upgrade_controller = new AutoUpgradeController;
                //     $auto_upgrade_controller->upgradePlan($commission_user->id);
                // }

                if($i == 1){
                    try {
                        Mail::send('email.active_mail', ['user_name'=>$commission_user->name,'amount'=>$commission_amount], function($message) use($commission_user){
                            $message->to($commission_user->email);
                            $message->subject('RichIND Notification');
                        });
                    } catch (\Throwable $th) {
                        //throw $th;
                    }
                }else{
                    try {
                        Mail::send('email.passive_mail', ['user_name'=>$commission_user->name,'amount'=>$commission_amount,'comes_from'=>$user], function($message) use($commission_user){
                            $message->to($commission_user->email);
                            $message->subject('RichIND Notification');
                        });
                    } catch (\Throwable $th) {
                        //throw $th;
                    }
                }
            }
        }
    }

    public function changePassword(Request $request){
        User::where('email',$request->email)->update(['password'=>Hash::make($request->password)]);

        return back()->with('success','Password Updated Successfully!');
    }

    public function edit($id){
        $user = User::with(['bankDetail','userDetail'])->find($id);

        return view('admin.user.edit',compact('user'),['page_title'=>'Edit User']);
    }

    public function update(Request $request,$id){
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'email|unique:users,email,'. $id .'id',
            'state' => 'required',
        ]);
        if($request->referral_code){
            $this->validate($request, [
                'referral_code' => [Rule::exists('users','referrer_code')->where('delete_status','0'),]
            ]);
        }

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->state = $request->state;
        $user->referral_code = $request->referral_code;
        $user->kyc_status = $request->kyc_status;
        $user->save();

        $user_detail = UserDetail::where('user_id',$id)->first();
        $user_detail->old_paid_payout = $request->old_paid_payout;
        $user_detail->old_not_paid_payout = $request->old_not_paid_payout;
        $user_detail->save();

        if($request->kyc_status != 'pending'){
            $bank_detail = BankDetail::where('user_id',$user->id)->first();
            if($bank_detail){
                if(File::exists('frontend/images/documents/'.optional($user->bankDetail)->aadhar_front_image)) {
                    File::delete('frontend/images/documents/'.optional($user->bankDetail)->aadhar_front_image);
                    $bank_detail->aadhar_front_image = null;
                }
                if(File::exists('frontend/images/documents/'.optional($user->bankDetail)->aadhar_back_image)) {
                    File::delete('frontend/images/documents/'.optional($user->bankDetail)->aadhar_back_image);
                    $bank_detail->aadhar_back_image = null;
                }
                if(File::exists('frontend/images/documents/'.optional($user->bankDetail)->pan_image)) {
                    File::delete('frontend/images/documents/'.optional($user->bankDetail)->pan_image);
                    $bank_detail->pan_image = null;
                }
                $bank_detail->save();

                try {
                    // Mail::send('email.kyc_status_mail', ['user_name'=>$user,'status'=>$request->kyc_status,'admin_message'=>$request->admin_message], function($message) use ($user){
                    //     $message->to($user->email);
                    //     $message->subject('KYC Status Richind');
                    // });
                } catch (\Throwable $th) {
                    //throw $th;
                }
            }


        }

        BankDetail::updateOrCreate([
            'user_id'=>$id
        ],[
            'holder_name'=>$request->holder_name,
            'ifsc_code'=>$request->ifsc_code,
            'account_number'=>$request->account_number,
            'bank_name'=>$request->bank_name,
            'upi_id'=>$request->upi_id,
            'note'=>$request->notes,
            'admin_message'=>$request->admin_message,
            'aadhaar_name'=>$request->aadhaar_name,
            'aadhaar_number'=>$request->aadhaar_number,
            'pan_name'=>$request->pan_name,
            'pan_number'=>$request->pan_number,
        ]);

        return redirect()->route('admin.user.index')->with('success','User Edited Successfully!');
    }

    public function upgradePlanIndex($user_id){
        $user = UserManager::withoutTrash()->where('id',$user_id)->with(['userDetail.plan'])->first();

        return view('admin.user.upgrade_pan',compact('user'),['page_title'=>'Upgrade Plan']);
    }

    public function upgradePlan(Request $request,$user_id){
        if($request->has('plan_id')){
            $user = User::where('id',$user_id)->first();
            $user_detail = UserDetail::where('user_id',$user_id)->first();
            $current_plan = Plan::where('id',$user_detail->current_plan_id)->first();
            $upgrade_plan_detail = Plan::where('id',$request->plan_id)->first();

            $user_detail->current_plan_id = $upgrade_plan_detail->id;
            $user_detail->save();

            $plan_purchase = new PlanPurchase;
            $plan_purchase->user_id = $user_id;
            $plan_purchase->plan_id = $upgrade_plan_detail->id;
            $plan_purchase->course_ids = $upgrade_plan_detail->course_ids;
            $plan_purchase->payment_detail = 'Updated by Admin';
            $plan_purchase->amount = 0;
            $plan_purchase->total_amount = 0;
            $plan_purchase->payment_status = 'success';
            $plan_purchase->save();

            $upgrade_commission_level = WebsiteSetting::where('type','upgrade_commission_level')->first();

            $referrer_code = $user->referral_code;

            for($i=1;$i<=$upgrade_commission_level->content;$i++){

                $commission_user = User::where('referrer_code',$referrer_code)->first();

                if($commission_user){
                    $update_commission = UserDetail::where('user_id',$commission_user->id)->first();
                    $referrer_code = optional(User::where('id',$update_commission->user_id)->first())->referral_code;
                }else{
                    $update_commission = UserDetail::first();
                    $referrer_code = User::where('id',$update_commission->user_id)->first()->referrer_code;
                }

                if($upgrade_plan_detail->priority <= $update_commission->plan->priority ){
                    $commission = new Commission;
                    $commission->user_id = $update_commission->user_id;
                    $commission->plan_purchase_id = $plan_purchase->id;
                    $commission->commission = $current_plan->upgrade_commission[$upgrade_plan_detail->priority - $current_plan->priority - 1][$i-1];
                    $commission->level = $i;
                    $commission->save();

                    $user_wallet = new UserWallet;
                    $user_wallet->user_id = $update_commission->user_id;
                    $user_wallet->from_id = $plan_purchase->id;
                    $user_wallet->amount = $current_plan->upgrade_commission[$upgrade_plan_detail->priority - $current_plan->priority - 1][$i-1];
                    $user_wallet->type = 'credit';
                    $user_wallet->from = 'upgrade';
                    $user_wallet->save();

                    $update_commission->total_commission = $update_commission->total_commission + $current_plan->upgrade_commission[$upgrade_plan_detail->priority - $current_plan->priority - 1][$i-1];
                    $update_commission->total_wallet_balance = $update_commission->total_wallet_balance + $current_plan->upgrade_commission[$upgrade_plan_detail->priority - $current_plan->priority - 1][$i-1];
                    $update_commission->save();

                    // $higher_plan = Plan::where('delete_status','0')->where('status','1')->latest('priority')->first();
                    // if($higher_plan->priority > $update_commission->plan->priority){
                    //     $level_up_wallet = new LevelUpWallet;
                    //     $level_up_wallet->user_id = $update_commission->user_id;
                    //     $level_up_wallet->from_id = $commission->id;
                    //     $level_up_wallet->amount = ($commission->commission*10)/100;
                    //     $level_up_wallet->type = 'credit';
                    //     if($i == 1){
                    //         $level_up_wallet->from = 'active_commission';
                    //     }else{
                    //         $level_up_wallet->from = 'passive_commission';
                    //     }
                    //     $level_up_wallet->save();

                    //     $user_wallet = new UserWallet;
                    //     $user_wallet->user_id = $update_commission->user_id;
                    //     $user_wallet->from_id = $level_up_wallet->id;
                    //     $user_wallet->amount = $level_up_wallet->amount;
                    //     $user_wallet->type = 'debit';
                    //     $user_wallet->from = 'level_up_wallet_commission';
                    //     $user_wallet->save();

                    //     $user_detail = UserDetail::where('user_id',$update_commission->user_id)->first();
                    //     $user_detail->total_wallet_balance = $user_detail->total_wallet_balance - $level_up_wallet->amount;
                    //     $user_detail->save();

                    //     $auto_upgrade_controller = new AutoUpgradeController;
                    //     $auto_upgrade_controller->upgradePlan($update_commission->user_id);
                    // }
                }


            }

            // $higher_plan = Plan::where('delete_status','0')->where('status','1')->latest('priority')->first();
            // if($user->userDetail->plan->priority == $higher_plan->priority){
            //     $total_user_level_up_wallet_credit_amount = LevelUpWallet::where('user_id',$user_id)->where('type','credit')->sum('amount');
            //     $total_user_level_up_wallet_debit_amount = LevelUpWallet::where('user_id',$user_id)->where('type','debit')->sum('amount');
            //     $total_user_level_up_wallet_remaining_amount = $total_user_level_up_wallet_credit_amount - $total_user_level_up_wallet_debit_amount;

            //     if($total_user_level_up_wallet_remaining_amount > 0){
            //         $level_up_wallet = new LevelUpWallet;
            //         $level_up_wallet->user_id = $user_id;
            //         $level_up_wallet->from_id = $user_id;
            //         $level_up_wallet->amount = $total_user_level_up_wallet_remaining_amount;
            //         $level_up_wallet->type = 'debit';
            //         $level_up_wallet->from = 'main_wallet_transfer';
            //         $level_up_wallet->save();


            //         $user_wallet = new UserWallet;
            //         $user_wallet->user_id = $user_id;
            //         $user_wallet->from_id = $level_up_wallet->id;
            //         $user_wallet->amount = $level_up_wallet->amount;
            //         $user_wallet->type = 'credit';
            //         $user_wallet->from = 'level_up_wallet_return';
            //         $user_wallet->save();

            //         $update_level_up_wallet = LevelUpWallet::find($level_up_wallet->id);
            //         $update_level_up_wallet->from_id = $user_wallet->id;
            //         $update_level_up_wallet->save();

            //         $user_detail = UserDetail::where('user_id',$user_id)->first();
            //         $user_detail->total_wallet_balance = $user_detail->total_wallet_balance + $level_up_wallet->amount;
            //         $user_detail->save();
            //     }
            // }
            return redirect()->route('admin.user.index')->with('success','Plan Upgraded Successfully!');
        }else{
            return back()->with('error','Please Select Plan First!');
        }
    }

    public function changeUserStatus($id,$status){
        User::where('id',$id)->update(['status'=>$status]);
        if($status == '0'){
            $type = 'error';
            $msg = 'User Ban Successfully!';
        }elseif($status == '1'){
            $type = 'success';
            $msg = 'User UnBan Successfully!';
        }
        return back()->with($type,$msg);
    }

    public function unpaidUserList(Request $request)
    {
        $search_key = $request->search_key;
        $search_date = $request->search_date;
        $users = UserManager::withoutTrash()->with('sponsorDetail', 'userDetail')->withSum('payout','amount');
        if($search_date)
        {
            $dates=explode('-',$search_date);
            $d1=strtotime($dates[0]);
            $d2=strtotime($dates[1]);
            $da1=date('Y-m-d',$d1);
            $da2=date('Y-m-d',$d2);
            $startDate = Carbon::createFromFormat('Y-m-d', $da1)->startOfDay();
            $endDate = Carbon::createFromFormat('Y-m-d', $da2)->endOfDay();

            $search_date=$dates[0].'-'.$dates[1];
            $users=$users->whereBetween('created_at', [$startDate, $endDate]);
        }
        if($search_key)
        {
            $users=$users->where(function ($query) use ($search_key){
                $query->where('name','like','%'.$search_key.'%')
                      ->orWhere('email','like','%'.$search_key.'%')
                      ->orWhere('phone','like','%'.$search_key.'%')
                      ->orWhere('referrer_code','like','%'.$search_key.'%');
            });
        }
        $search = '';
        $users = $users->whereHas('userDetail', function ($q) use ($search){
            $q->where('old_not_paid_payout', '>', '0');
        });

        $users = $users->orderBy('created_at','desc')->paginate(10);
        return view('admin.user.unpaid_user_list',compact('users','search_key','search_date'),['page_title'=>'Users']);
    }

    public function webhookRegistration(Request $request){
        try {
            if(Hash::check('RichInd@2023',$request->header('key'))){

                $registration_error_log = RegistrationErrorLog::where('email',$request->email)->latest()->first();
                $registration_error_log->from = 'cosmofeed';
                $registration_error_log->payment_id = $request->payment_Id?$request->payment_Id:'';

                if(Hash::check($registration_error_log->id,$request->checksum)){
                    $input = $request->all();
                    $input['phone'] = $request->phone;
                    $validator =  Validator::make($input, [
                        'email' => 'required|email|max:255|unique:users',
                        'phone' => 'required|unique:users,phone',
                        'payment_Id' => 'required',
                    ]);

                    if($validator->fails()){
                        $registration_error_log->error= $validator->errors();
                        $registration_error_log->save();
                        return $validator->errors();
                    }

                    $plan = Plan::where('id',$registration_error_log->plan)->first();

                    if($request->status == 'paid'){
                        $user = new User;
                        $user->added_by = 'cosmofeed';
                        $user->name = $registration_error_log->name;
                        $user->email = $registration_error_log->email;
                        $user->phone = $registration_error_log->phone;
                        $user->state = $registration_error_log->state;

                        do {
                            $referrer_code = 'RIND' . strtoupper(generateRandomString(8));
                        } while (User::where('referrer_code', $referrer_code)->exists());

                        $user->referrer_code = $referrer_code;
                        $user->referral_code = $registration_error_log->referral_code;
                        $user->password = Hash::make($registration_error_log->password);
                        $user->is_old = '0';
                        $user->save();

                        $user_detail = new UserDetail;
                        $user_detail->user_id = $user->id;
                        $user_detail->current_plan_id = $plan->id;
                        $user_detail->save();

                        $plan_purchase = new PlanPurchase;
                        $plan_purchase->user_id = $user->id;
                        $plan_purchase->plan_id = $plan->id;
                        $plan_purchase->course_ids = $plan->course_ids;
                        $plan_purchase->amount = $plan->amount;
                        if($registration_error_log->referral_code){
                            $plan_purchase->discounted_amount = $plan->amount - $plan->discounted_price;
                            $plan_purchase->total_amount = $plan->discounted_price;
                            $plan_purchase->payment_detail = json_encode(['id'=>$request->payment_id,'amount'=>$plan->discounted_price]);
                        }else{
                            $plan_purchase->total_amount = $plan->amount;
                            $plan_purchase->payment_detail = json_encode(['id'=>$request->payment_id,'amount'=>$plan->amount]);
                        }
                        $plan_purchase->payment_status = 'success';
                        $plan_purchase->save();

                        try {
                            Mail::send('email.welcome_mail', ['user_name'=>$user], function($message) use ($user){
                                $message->to($user->email);
                                $message->subject('Welcome to RichInd');
                            });
                        } catch (\Throwable $th) {
                            //throw $th;
                        }

                        if($registration_error_log->referral_code){
                            $this->distributeCommission($registration_error_log->referral_code,$plan->id,$plan_purchase->id,$user);
                        }else{
                            $commission_setting = CommissionSetting::get();
                            $level = $commission_setting->count();
                            for($i=1;$i<=$level;$i++){
                                $commission_user = User::with('userDetail.plan')->first();
                                if($commission_user->userDetail->plan->priority <= $plan->priority){
                                    $commission_amount = $commission_user->userDetail->plan->commission[$i-1];
                                }else{
                                    $commission_amount = $plan->commission[$i-1];
                                }
                                $commission = new Commission;
                                $commission->user_id = $commission_user->id;
                                $commission->plan_purchase_id = $plan_purchase->id;
                                $commission->commission = $commission_amount;
                                $commission->level = $i;
                                $commission->save();

                                $user_wallet = new UserWallet;
                                $user_wallet->user_id = $commission_user->id;
                                $user_wallet->from_id = $plan_purchase->id;
                                $user_wallet->amount = $commission_amount;
                                $user_wallet->type = 'credit';
                                if($i == 1){
                                    $user_wallet->from = 'active_commission';
                                }else{
                                    $user_wallet->from = 'passive_commission';
                                }
                                $user_wallet->save();

                                $user_detail = UserDetail::where('user_id',User::first()->id)->first();
                                $user_detail->total_commission = $user_detail->total_commission + $commission_amount;
                                $user_detail->total_wallet_balance = $user_detail->total_wallet_balance + $commission_amount;
                                $user_detail->save();

                                // $higher_plan = Plan::where('delete_status','0')->where('status','1')->latest('priority')->first();
                                // if($higher_plan->priority > $commission_user->userDetail->plan->priority){
                                //     $level_up_wallet = new LevelUpWallet;
                                //     $level_up_wallet->user_id = $commission_user->id;
                                //     $level_up_wallet->from_id = $commission->id;
                                //     $level_up_wallet->amount = ($commission_amount*10)/100;
                                //     $level_up_wallet->type = 'credit';
                                //     if($i == 1){
                                //         $level_up_wallet->from = 'active_commission';
                                //     }else{
                                //         $level_up_wallet->from = 'passive_commission';
                                //     }
                                //     $level_up_wallet->save();

                                //     $user_wallet = new UserWallet;
                                //     $user_wallet->user_id = $commission_user->id;
                                //     $user_wallet->from_id = $level_up_wallet->id;
                                //     $user_wallet->amount = $level_up_wallet->amount;
                                //     $user_wallet->type = 'debit';
                                //     $user_wallet->from = 'level_up_wallet_commission';
                                //     $user_wallet->save();

                                //     $user_detail = UserDetail::where('user_id',User::first()->id)->first();
                                //     $user_detail->total_wallet_balance = $user_detail->total_wallet_balance - $level_up_wallet->amount;
                                //     $user_detail->save();

                                //     $auto_upgrade_controller = new AutoUpgradeController;
                                //     $auto_upgrade_controller->upgradePlan($commission_user->id);
                                // }

                                if($i == 1){
                                    try {
                                        Mail::send('email.active_mail', ['user_name'=>$commission_user->name,'amount'=>$commission_amount], function($message) use($commission_user){
                                            $message->to($commission_user->email);
                                            $message->subject('RichInd Notification');
                                        });
                                    } catch (\Throwable $th) {
                                        //throw $th;
                                    }
                                }else{
                                    try {
                                        Mail::send('email.passive_mail', ['user_name'=>$commission_user->name,'amount'=>$commission_amount,'comes_from'=>$user], function($message) use($commission_user){
                                            $message->to($commission_user->email);
                                            $message->subject('RichInd Notification');
                                        });
                                    } catch (\Throwable $th) {
                                        //throw $th;
                                    }
                                }
                            }
                        }
                        RegistrationErrorLog::where('email',$request->email)->delete();
                        return response()->json(['status'=>'Webhook Received']);
                    }else{
                        $registration_error_log->error= 'Payment Failed';
                        $registration_error_log->save();
                        return response()->json(['message'=>'Payment Failed','status'=>401],401);
                    }
                }else{
                    $registration_error_log->error= 'Invalid Checksum';
                    $registration_error_log->save();
                    return response()->json(['message'=>'Invalid Key','status'=>401],401);
                }
            }else{
                $registration_error_log = RegistrationErrorLog::where('email',$request->email)->latest()->first();
                $registration_error_log->from = 'cosmofeed';
                $registration_error_log->payment_id = $request->payment_Id?$request->payment_Id:'';
                $registration_error_log->error= 'Invalid Key';
                $registration_error_log->save();
                return response()->json(['message'=>'Invalid Key','status'=>401],401);
            }
        } catch (\Throwable $th) {
            return $th;
            $registration_error_log = RegistrationErrorLog::where('email',$request->email)->latest()->first();
            $registration_error_log->from = 'cosmofeed';
            $registration_error_log->payment_id = $request->payment_Id?$request->payment_Id:'';
            $registration_error_log->error= 'Something went wrong';
            $registration_error_log->save();

            return response()->json(['msg'=>'Something went wrong!'],401);
        }

    }

    public function userLogin($user_id){
        $user = User::find($user_id);

        Auth::guard('web')->login($user);

        return redirect()->route('user.dashboard')->with('success','User Login Successfully!');
    }

    public function userCommissionPayout(Request $request) {
        $search_key = $request->search_key;
        $search_payout_date = $request->search_payout_date;
        $search_commission_date = $request->search_commission_date;

        $users = UserDetail::where('total_wallet_balance','>',0)->when($search_payout_date, function($query) use ($search_payout_date){
            $query->whereDoesntHave('payouts', function($quer) use ($search_payout_date){
                $quer->whereDate('created_at','>=', Carbon::createFromFormat('Y-m-d', $search_payout_date)->startOfDay());
            });
        })->when($search_commission_date, function($query) use ($search_commission_date){
            $query->whereDoesntHave('commissions', function($quer) use ($search_commission_date){
                $quer->whereDate('created_at','>=', Carbon::createFromFormat('Y-m-d', $search_commission_date)->startOfDay());
            });
        })->when($search_key, function($query) use ($search_key){
            $query->whereHas('user',function($quer) use ($search_key){
                $quer->where(function($que) use ($search_key){
                    $que->where('name','like','%'.$search_key.'%')
                    ->orWhere('email','like','%'.$search_key.'%')
                    ->orWhere('phone','like','%'.$search_key.'%')
                    ->orWhere('referrer_code','like','%'.$search_key.'%');
                });
            });
        })->with('user','lastPayout','lastCommission')->orderBy('total_wallet_balance','desc')->paginate(10);

        return view('admin.user.commission_payout',compact('users','search_key','search_payout_date','search_commission_date'),['page_title'=>'Commission Payout']);
    }

    public function withdrawalAmount($user_id){
        $user = User::where('id',$user_id)->with('userDetail.lastPayout','userDetail.lastCommission')->first();
        if(!$user){
            return redirect()->route('admin.user.commission.payout')->with('error','User Not Found!');
        }

        return view('admin.user.withdrawal_amount',compact('user'),['page_title'=>'Withdrawal Amount']);
    }

    public function withdrawalAmountStore(Request $request,$user_id) {
        $user = User::where('id',$user_id)->with('userDetail')->first();
        if(!$user){
            return redirect()->route('admin.user.commission.payout')->with('error','User Not Found!');
        }

        if($request->withdrawal_amount > $user->userDetail->total_wallet_balance){
            return back()->with('error','Withdrawal Amount is Greater than Total Wallet Balance!');
        }

        $payout = new Payout;
        $payout->user_id = $user->id;
        $payout->amount = $request->withdrawal_amount;
        $payout->service_charge = 0;
        $payout->tds_charge = 0;
        $payout->payment_type = 'cash';
        $payout->payment_status = 'success';
        $payout->remark = 'Withdrawal By Admin';
        $payout->is_show = '0';
        $payout->save();

        $user_wallet = new UserWallet;
        $user_wallet->user_id = $user->id;
        $user_wallet->from_id = $payout->id;
        $user_wallet->amount = $request->withdrawal_amount;
        $user_wallet->type = 'debit';
        $user_wallet->from = 'payout';
        $user_wallet->remark = 'Withdrawal By Admin';
        $user_wallet->is_show = '0';
        $user_wallet->save();

        $user_detail = UserDetail::where('user_id',$user->id)->first();
        $user_detail->total_wallet_balance = $user_detail->total_wallet_balance - $request->withdrawal_amount;
        $user_detail->save();

        return redirect()->route('admin.user.commission.payout')->with('success','Withdrawal Successfull!');
    }

    public function transferLevelupWalletAmount(){
        $usersWithPositiveBalance = LevelUpWallet::select('user_id', DB::raw('SUM(CASE WHEN type = "credit" THEN amount ELSE 0 END) as total_credit'), DB::raw('SUM(CASE WHEN type = "debit" THEN amount ELSE 0 END) as total_debit'))
        ->groupBy('user_id')
        ->havingRaw('total_credit - total_debit > 0')
        ->get();

        foreach ($usersWithPositiveBalance as $key => $usersWithPositiveBalanc) {
            $user_wallets = new UserWallet;
            $user_wallets->user_id = $usersWithPositiveBalanc->user_id;
            $user_wallets->from_id = $usersWithPositiveBalanc->user_id;
            $user_wallets->amount = $usersWithPositiveBalanc->total_credit;
            $user_wallets->type = 'credit';
            $user_wallets->from = 'level_up_wallet_transfer';
            $user_wallets->remark = 'fund transferred from level up wallet to main wallet';
            $user_wallets->save();

            $user_detail = UserDetail::where('user_id',$usersWithPositiveBalanc->user_id)->first();
            $user_detail->total_wallet_balance = $user_detail->total_wallet_balance + $usersWithPositiveBalanc->total_credit;
            $user_detail->save();
        }
    }

}
