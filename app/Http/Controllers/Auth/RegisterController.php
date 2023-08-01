<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use Razorpay\Api\Api;
use App\Jobs\ImportUser;
use App\CPU\CouponManager;
use App\Models\Admin\Plan;
use App\Models\Commission;
use App\Models\PlanPurchase;
use Illuminate\Http\Request;
use App\Models\Admin\UserDetail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\SignupRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\Admin\CommissionSetting;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\PhonepeController;
use App\Http\Controllers\InstamojoController;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    private $email;

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function validateUserRegistration(SignupRequest $request)
    {
        $plan = Plan::where('id',$request->plan_id)->first();
        if($request->referral_code){
            $amount = $plan->discounted_price;
        }else{
            $amount = $plan->amount;
        }

        $today_date = date('Y-m-d').' 00:00:00';
        $coupon = CouponManager::withoutTrash()->where('name',$request->coupon)->where('is_active','1')->where('start','<=',$today_date)->where('end','>=',$today_date)->where('type','new')->whereJsonContains('plan_ids',''.$request->plan_id)->first();
        if($coupon){
            return $amount = $amount - $coupon->amount;
        }else{
            return $amount;
        }
    }

    // public function payment(Request $request)
    // {
    //     $input = $request->all();

    //     $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

    //     $payment = $api->payment->fetch($request->razorpay_payment_id);

    //     if(count($input)  && !empty($request->razorpay_payment_id)) {
    //         $payment_detalis = null;
    //         try {
    //             $response = $api->payment->fetch($request->razorpay_payment_id)->capture(array('amount'=>$payment['amount']));
    //             $payment_detalis = json_encode(array('id' => $response['id'],'method' => $response['method'],'amount' => $response['amount']/100,'currency' => $response['currency']));
    //             $request->request->add(['payment_detalis' => $payment_detalis]);
    //             $plan = Plan::where('id',$request->plan_id)->first();

    //             if($request->referral_code){
    //                 $total_amount = $plan->discounted_price;
    //             }else{
    //                 $total_amount = $plan->amount;
    //             }

    //             $today_date = date('Y-m-d').' 00:00:00';
    //             $coupon = CouponManager::withoutTrash()->where('name',$request->coupon)->where('is_active','1')->where('start','<=',$today_date)->where('end','>=',$today_date)->where('type','new')->whereJsonContains('plan_ids',''.$request->plan_id)->first();
    //             if($coupon){
    //                 $total_amount = $total_amount - $coupon->amount;
    //             }

    //             if(json_decode($payment_detalis)->amount == $total_amount){
    //                 $this->register($request);
    //             }else{
    //                 return response()->json(['msg'=>'Data Modification Not Allowed','payment_detalis'=>$payment_detalis],401);
    //             }

    //         } catch (\Exception $e) {
    //             return  $e->getMessage();
    //             \Session::put('error',$e->getMessage());
    //             return redirect()->back();
    //         }
    //     }

    //     return json_decode($payment_detalis);
    // }

    // public function payment(Request $request){
    //     $instamojo = new InstamojoController;
    //     return $instamojo->pay($request);
    // }

    public function payment(Request $request){
        $phonepe = new PhonepeController;
        return $phonepe->payWithPhonePe($request);
    }

    public function register(Request $request)
    {
        $user = new User;
        if($request->has('name')){
            $user->name = $request->name;
        }
        if($request->has('first_name')){
            $user->name = $request->first_name.' '.$request->last_name;
        }
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->state = $request->state;
        $user->referrer_code = 'TSP'.strtoupper(generateRandomString(6));
        $user->referral_code = $request->referral_code;
        $user->password = Hash::make($request->password);
        $user->save();
        if($request->has('first_name')){
            $plan = Plan::where('id',$request->plan_id)->first();

            $plan_purchase = new PlanPurchase;
            $plan_purchase->user_id = $user->id;
            $plan_purchase->plan_id = $plan->id;
            $plan_purchase->course_ids = $plan->course_ids;
            $plan_purchase->amount = $plan->amount;
            if($request->referral_code){
                $total_amount = $plan->discounted_price;
                $plan_purchase->discounted_amount = $plan->amount - $plan->discounted_price;
            }else{
                $total_amount = $plan->amount;
            }

            $today_date = date('Y-m-d').' 00:00:00';
            $coupon = CouponManager::withoutTrash()->where('name',$request->coupon)->where('is_active','1')->where('start','<=',$today_date)->where('end','>=',$today_date)->where('type','new')->whereJsonContains('plan_ids',''.$request->plan_id)->first();
            if($coupon){
                $plan_purchase->coupon_detail = $coupon;
                $plan_purchase->coupon_discount_amount = $coupon->amount;
                $total_amount = $total_amount - $coupon->amount;
            }
            $plan_purchase->total_amount = $total_amount;

            $plan_purchase->payment_detail = $request->payment_detalis;
            $plan_purchase->payment_status = 'success';
            $plan_purchase->save();

            $user_detail = new UserDetail;
            $user_detail->user_id = $user->id;
            $user_detail->current_plan_id = $plan->id;
            $user_detail->save();

            try{
                Mail::send('email.welcome_mail', ['user_name'=>$user], function($message) use ($user){
                    $message->to($user->email);
                    $message->subject('Welcome to The Success Preneur');
                });
            }catch (\Throwable $th) {

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
                            $this->email = $commission_user;
                            Mail::send('email.active_mail', ['user_name'=>$commission_user->name,'amount'=>$commission_amount], function($message) use($commission_user){
                                $message->to($commission_user->email);
                                $message->subject('The Success Preneur Notification');
                            });
                        } catch (\Throwable $th) {

                        }
                    }else{
                        try {
                            Mail::send('email.passive_mail', ['user_name'=>$commission_user->name,'amount'=>$commission_amount,'comes_from'=>$this->email], function($message) use($commission_user){
                                $message->to($commission_user->email);
                                $message->subject('The Success Preneur Notification');
                            });
                            $this->email = $commission_user;
                        } catch (\Throwable $th) {

                        }
                    }
                }
            }
        }
        session()->forget('referrer_code');
        Auth::login($user);
        $amount = $plan_purchase->total_amount;
        return redirect()->route('thank.you',compact('user','amount'));
    }

    public function distributeCommission($referral_code,$plan_id,$plan_purchase_id,$user)
    {
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
                            $this->email = $commission_user;
                            $message->to($commission_user->email);
                            $message->subject('The Success Preneur Notification');
                        });
                    } catch (\Throwable $th) {

                    }
                }else{
                    try {
                        $user = User::where('referrer_code',$commission_user->referral_code)->first();
                        Mail::send('email.passive_mail', ['user_name'=>$commission_user->name,'amount'=>$commission_amount,'comes_from'=>$this->email], function($message) use($commission_user){
                            $message->to($commission_user->email);
                            $message->subject('The Success Preneur Notification');
                        });
                        $this->email = $commission_user;
                    } catch (\Throwable $th) {

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
                            $this->email = $commission_user;
                            $message->to($commission_user->email);
                            $message->subject('The Success Preneur Notification');
                        });
                    } catch (\Throwable $th) {

                    }
                }else{
                    try {
                        $user = User::where('referrer_code',$commission_user->referral_code)->first();
                        Mail::send('email.passive_mail', ['user_name'=>$commission_user->name,'amount'=>$commission_amount,'comes_from'=>$this->email], function($message) use($commission_user){
                            $message->to($commission_user->email);
                            $message->subject('The Success Preneur Notification');
                        });
                        $this->email = $commission_user;
                    } catch (\Throwable $th) {
                    }
                }
            }
        }
    }

    public function importData(){
        $emailJobs = new ImportUser();
        $this->dispatch($emailJobs);

        return 'Data Imported Successfully!';
    }

    public function checkCoupon(Request $request){
        $today_date = date('Y-m-d').' 00:00:00';
        $coupon = CouponManager::withoutTrash()->where('name',$request->coupon)->where('is_active','1')->where('start','<=',$today_date)->where('end','>=',$today_date)->where('type','new')->whereJsonContains('plan_ids',''.$request->plan_id)->first();
        if($coupon){
            return $coupon;
        }else{
            return response()->json(['msg'=>'Invalid Coupon Code!'], 401);
        }
    }
}
