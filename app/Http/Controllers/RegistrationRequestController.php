<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin\Plan;
use App\Models\UserWallet;
use App\Models\PlanPurchase;
use Illuminate\Http\Request;
use App\Models\Admin\UserDetail;
use App\Models\WithdrawalRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\WalletRegistrationRequest;
use App\Http\Controllers\Auth\RegisterController;

class RegistrationRequestController extends Controller
{

    public function index(Request $request){
        $search_date = $request->search_date;
        $search_plan = $request->search_plan_id;
        $search_key = $request->search_key;

        $users = WalletRegistrationRequest::where('referral_code',Auth::guard('web')->user()->referrer_code);

        if($search_date){
            $dates=explode('-',$search_date);
            $d1=strtotime($dates[0]);
            $d2=strtotime($dates[1]);
            $da1=date('Y-m-d',$d1);
            $da2=date('Y-m-d',$d2);
            $startDate = Carbon::createFromFormat('Y-m-d', $da1)->startOfDay();
            $endDate = Carbon::createFromFormat('Y-m-d', $da2)->endOfDay();

            $search_date=$dates[0].' - '.$dates[1];
            $users = $users->whereBetween('created_at', [$startDate, $endDate]);
        }
        if($search_plan){
            $users = $users->where('plan',$search_plan);
        }
        if($search_key){
            $users = $users->where(function($query) use ($search_key){
                $query->where('phone',$search_key)->orWhere('name','like','%'.$search_key.'%')->orWhere('email','like','%'.$search_key.'%');
            });
        }

        $users = $users->with('planDetail')->latest()->paginate(10);

        return view('user_dashboard.registration_request.index',compact('users','search_date','search_plan','search_key'));
    }

    public function detail($id){
        $user = WalletRegistrationRequest::where('referral_code',Auth::guard('web')->user()->referrer_code)->where('id',$id)->first();

        return view('user_dashboard.registration_request.show',compact('user'));
    }

    public function store(Request $request,$id){
        $this->validate($request,[
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|min:10|max:10|unique:users,phone',
        ]);
        $withdrawal_request = WithdrawalRequest::where('user_id',Auth::guard('web')->user()->id)->latest()->first();

        if($withdrawal_request?->status == 'pending'){
            return back()->with('error','You Have Pending Withdrawal Request!');
        }else{
            $reg_user = WalletRegistrationRequest::where('referral_code',Auth::guard('web')->user()->referrer_code)->where('id',$id)->first();
            if($reg_user->status == 'pending'){
                $plan = Plan::where('id',$reg_user->plan)->first();

                if(websiteData('discount_percent')){
                    $final_amount = $plan->discounted_price - ($plan->discounted_price*websiteData('discount_percent'))/100;
                }else{
                    $final_amount = $plan->discounted_price;
                }

                $first_commission = 0;
                if(Auth::guard('web')->user()->userDetail->plan->priority <= $plan->priority){
                    $first_commission = Auth::guard('web')->user()->userDetail->plan->commission[0];
                }else{
                    $first_commission = $plan->commission[0];
                }

                if(($final_amount - $first_commission) <= Auth::guard('web')->user()->userDetail->total_wallet_balance){
                    $user = new User;
                    $user->name = $reg_user->name;
                    $user->email = $reg_user->email;
                    $user->phone = $reg_user->phone;
                    $user->state = $reg_user->state;
                    do {
                        $referrer_code = 'RIND' . strtoupper(generateRandomString(8));
                    } while (User::where('referrer_code', $referrer_code)->exists());

                    $user->referrer_code = $referrer_code;
                    $user->referral_code = $reg_user->referral_code;
                    $user->password = Hash::make($reg_user->password);
                    $user->save();

                    $plan_purchase = new PlanPurchase;
                    $plan_purchase->user_id = $user->id;
                    $plan_purchase->plan_id = $plan->id;
                    $plan_purchase->amount = $plan->amount;
                    $plan_purchase->discounted_amount = $plan->amount - $plan->discounted_price;
                    if(websiteData('discount_percent')){
                        $plan_purchase->extra_discount = ($final_amount*websiteData('discount_percent'))/100;
                    }
                    $plan_purchase->total_amount = $final_amount;
                    $plan_purchase->payment_detail = json_encode(['id'=>'From Wallet','amount'=>$final_amount,'method'=>'Wallet']);
                    $plan_purchase->payment_status = 'success';
                    $plan_purchase->save();

                    $user_detail = new UserDetail;
                    $user_detail->user_id = $user->id;
                    $user_detail->current_plan_id = $plan->id;
                    $user_detail->save();

                    try{
                        Mail::send('email.welcome_mail', ['user_name'=>$user], function($message) use ($user){
                            $message->to($user->email);
                            $message->subject('Welcome to Adsgyan');
                        });
                    }catch (\Throwable $th) {

                    }

                    if($reg_user->referral_code){
                        $register_controller = new RegisterController;
                        $register_controller->distributeCommission($reg_user->referral_code,$plan->id,$plan_purchase->id,$user);
                    }

                    $reg_user->status = 'success';
                    $reg_user->save();

                    $user_wallet = new UserWallet;
                    $user_wallet->user_id = Auth::guard('web')->user()->id;
                    $user_wallet->from_id = $plan_purchase->id;
                    $user_wallet->amount = $final_amount;
                    $user_wallet->type = 'debit';
                    $user_wallet->from = 'register';
                    $user_wallet->save();

                    $user_detail = UserDetail::where('user_id',Auth::guard('web')->user()->id)->first();
                    $user_detail->total_wallet_balance = $user_detail->total_wallet_balance - $final_amount;
                    $user_detail->save();

                    if(websiteData('bonus_percent')){
                        $user_wallet = new UserWallet;
                        $user_wallet->user_id = Auth::guard('web')->user()->id;
                        $user_wallet->from_id = $plan_purchase->id;
                        $user_wallet->amount = ($final_amount*websiteData('bonus_percent'))/100;
                        $user_wallet->type = 'credit';
                        $user_wallet->from = 'bonus';
                        $user_wallet->save();

                        $user_detail = UserDetail::where('user_id',Auth::guard('web')->user()->id)->first();
                        $user_detail->total_wallet_balance = $user_detail->total_wallet_balance + $user_wallet->amount;
                        $user_detail->save();
                    }

                    return redirect()->route('user.registration.request')->with('success','User Register Successfully!');
                }else{
                    return back()->with('error','You Have Insufficient Balance!');
                }
            }else{
                return back()->with('error','This Request Already Proccessed!');
            }
        }
    }

    public function walletRegistration(){
        return view('user_dashboard.wallet_registration.index');
    }

    public function walletRegistrationStore(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'phone' => 'required|min:10|max:10|unique:users,phone',
            'state' => 'required|string|max:255',
            'plan' => 'required|exists:plans,id',
            'wallet_pin' => 'required|string|in:'.Auth::guard('web')->user()->wallet_pin,
        ]);

        $wallet_registration_request = new WalletRegistrationRequest;
        $wallet_registration_request->name = $request->name;
        $wallet_registration_request->email = $request->email;
        $wallet_registration_request->phone = $request->phone;
        $wallet_registration_request->state = $request->state;
        $wallet_registration_request->plan = $request->plan;
        $wallet_registration_request->referral_code = Auth::guard('web')->user()->referrer_code;
        $wallet_registration_request->password = $request->email;
        $wallet_registration_request->status = 'pending';
        $wallet_registration_request->save();

        return $this->store($request,$wallet_registration_request->id);
    }

}
