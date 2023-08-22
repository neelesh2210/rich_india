<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Carbon\Carbon;
use App\Models\User;
use App\CPU\UserManager;
use App\Models\Admin\Plan;
use App\Models\BankDetail;
use App\Models\Commission;
use App\Models\PlanPurchase;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Admin\UserDetail;
use App\Http\Controllers\Controller;
use App\Models\Admin\WebsiteSetting;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\Admin\CommissionSetting;

class UserController extends Controller
{

    public function index(Request $request){
        $search_key = $request->search_key;
        $search_date = $request->search_date;
        $search_have_sponser  = $request->search_have_sponser;
        $search_register_from = $request->search_register_from;
        $search_commission = $request->search_commission;

        $users = UserManager::withoutTrash()->with(['sponsorDetail','userDetail'])->withSum('payout','amount');
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
        $users = $users->orderBy('id','desc')->paginate(10);

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

    public function create(){
        return view('admin.user.create',['page_title'=>'Add User']);
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
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

                $user_detail = UserDetail::where('user_id',User::first()->id)->first();
                $user_detail->total_commission = $user_detail->total_commission + $commission_amount;
                $user_detail->save();

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
        return redirect()->route('admin.get.old.users')->with('success','Old User Registered Successfully!');
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

                $user_detail = UserDetail::where('user_id',$commission_user->id)->first();
                $user_detail->total_commission = $user_detail->total_commission + $commission_amount;
                $user_detail->save();

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

                $user_detail = UserDetail::where('user_id',User::first()->id)->first();
                $user_detail->total_commission = $user_detail->total_commission + $commission_amount;
                $user_detail->save();

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
        $user->save();

        $user_detail = UserDetail::where('user_id',$id)->first();
        $user_detail->old_paid_payout = $request->old_paid_payout;
        $user_detail->old_not_paid_payout = $request->old_not_paid_payout;
        $user_detail->save();

        BankDetail::updateOrCreate([
            'user_id'=>$id
        ],[
            'holder_name'=>$request->holder_name,
            'ifsc_code'=>$request->ifsc_code,
            'account_number'=>$request->account_number,
            'bank_name'=>$request->bank_name,
            'upi_id'=>$request->upi_id,
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
                $commission = new Commission;
                $commission->user_id = $update_commission->user_id;
                $commission->plan_purchase_id = $plan_purchase->id;
                $commission->commission = $current_plan->upgrade_commission[$upgrade_plan_detail->priority - $current_plan->priority - 1][$i-1];
                $commission->level = $i;
                $commission->save();

                $update_commission->total_commission = $update_commission->total_commission + $current_plan->upgrade_commission[$upgrade_plan_detail->priority - $current_plan->priority - 1][$i-1];
                $update_commission->save();

            }

            // $commission_user = User::where('referrer_code',$user->referral_code)->first();
            // if($commission_user){
            //     $update_commission = UserDetail::where('user_id',$commission_user->id)->first();
            // }else{
            //     $update_commission = UserDetail::first();
            // }

            // $commission = new Commission;
            // $commission->user_id = $update_commission->user_id;
            // $commission->plan_purchase_id = $plan_purchase->id;
            // $commission->commission = 0;
            // $commission->level = 1;
            // $commission->save();

            // $update_commission->total_commission = $update_commission->total_commission + 0;
            // $update_commission->save();

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

}
