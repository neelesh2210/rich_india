<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use Razorpay\Api\Api;
use App\Jobs\ImportUser;
use App\CPU\CouponManager;
use App\Models\Admin\Plan;
use App\Models\Commission;
use App\Models\UserWallet;
use App\Models\PlanPurchase;
use Illuminate\Http\Request;
use App\Models\LevelUpWallet;
use App\Models\Admin\UserDetail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\SignupRequest;
use App\Models\RegistrationErrorLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\Admin\CommissionSetting;
use App\Providers\RouteServiceProvider;
use App\Models\WalletRegistrationRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\PhonepeController;
use App\Http\Controllers\InstamojoController;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Controllers\AutoUpgradeController;

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
            'password' => ['required', 'string', 'min:4', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data){
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function validateUserRegistration(SignupRequest $request){
        \Session::forget('registration_error_log_id');
        $plan = Plan::where('id',$request->plan_id)->first();

        if($request->referral_code){
            $amount = $plan->discounted_price;
        }else{
            $amount = $plan->amount;
        }

        $today_date = date('Y-m-d').' 00:00:00';
        $coupon = CouponManager::withoutTrash()->where('name',$request->coupon)->where('is_active','1')->where('start','<=',$today_date)->where('end','>=',$today_date)->where('type','new')->whereJsonContains('plan_ids',''.$request->plan_id)->first();
        if($coupon){
            $amount = $amount - $coupon->amount;
        }else{
            $amount;
        }

        $registration_error_log = new RegistrationErrorLog;
        $registration_error_log->from = 'website';
        $registration_error_log->name = $request->name;
        $registration_error_log->email = $request->email;
        $registration_error_log->phone = $request->phone;
        $registration_error_log->state = $request->state;
        $registration_error_log->plan = $request->plan_id;
        $registration_error_log->referral_code = $request->referral_code;
        $registration_error_log->password = $request->password;
        $registration_error_log->error = 'Self Registration Payment Error.';
        $registration_error_log->save();

        \Session::put('registration_error_log_id',encrypt($registration_error_log->id));

        if($request->referral_code){
            $cosmofeed_url = $plan->cosmofeed_discounted_price_url.'?email='.$request->email.'&phone='.$request->phone.'&checksum='.Hash::make($registration_error_log->id);
        }else{
            $cosmofeed_url = $plan->cosmofeed_base_price_url.'?email='.$request->email.'&phone='.$request->phone.'&checksum='.Hash::make($registration_error_log->id);
        }

        return ['amount'=>$amount,'url'=>$cosmofeed_url];
    }

    //Razorpay
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

    //             // if($request->referral_code){
    //             //     $total_amount = $plan->discounted_price;
    //             // }else{
    //             //     $total_amount = $plan->amount;
    //             // }

    //             $total_amount = $plan->discounted_price;

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

    //Instamojo
    public function payment(Request $request){
        $registration_error_log_id = \Session::get('registration_error_log_id');
        $registration_error_log = RegistrationErrorLog::where('id',decrypt($registration_error_log_id))->first();

        $plan = Plan::where('id',$registration_error_log->plan)->first();

        if($registration_error_log->referral_code){
            $amount = $plan->discounted_price;
        }else{
            $amount = $plan->amount;
        }

        $request->request->add(['name'=>$registration_error_log->name,'email'=>$registration_error_log->email,'phone'=>$registration_error_log->phone,'amount'=>$amount,'state'=>$registration_error_log->state,'referral_code'=>$registration_error_log->referral_code,'password'=>$registration_error_log->password,'plan_id'=>$registration_error_log->plan]);
        $instamojo = new InstamojoController;
        return redirect()->to($instamojo->pay($request));
    }

    //Phonepe
    public function phonepePayment(Request $request){
        $registration_error_log_id = \Session::get('registration_error_log_id');
        $registration_error_log = RegistrationErrorLog::where('id',decrypt($registration_error_log_id))->first();

        $plan = Plan::where('id',$registration_error_log->plan)->first();

        if($registration_error_log->referral_code){
            $amount = $plan->discounted_price;
        }else{
            $amount = $plan->amount;
        }

        $request->request->add(['name'=>$registration_error_log->name,'email'=>$registration_error_log->email,'phone'=>$registration_error_log->phone,'amount'=>$amount,'state'=>$registration_error_log->state,'referral_code'=>$registration_error_log->referral_code,'password'=>$registration_error_log->password,'plan_id'=>$registration_error_log->plan]);
        $phonepe = new PhonepeController;

        return redirect()->to($phonepe->payWithPhonePe($request));
    }

    //Cash
    // public function payment(Request $request){
    //     $registration_error_log = RegistrationErrorLog::where('phone',$request->phone)->latest()->first();
    //     return route('cash.payment',encrypt($registration_error_log->id));
    // }

    public function register(Request $request){
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->state = $request->state;
        do {
            $referrer_code = 'RIND' . strtoupper(generateRandomString(8));
        } while (User::where('referrer_code', $referrer_code)->exists());

        $user->referrer_code = $referrer_code;
        $user->referral_code = $request->referral_code;
        $user->password = Hash::make($request->password);
        $user->save();

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
                $message->subject('Welcome to RichIND');
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
                        $this->email = $commission_user;
                        Mail::send('email.active_mail', ['user_name'=>$commission_user->name,'amount'=>$commission_amount], function($message) use($commission_user){
                            $message->to($commission_user->email);
                            $message->subject('RichIND Notification');
                        });
                    } catch (\Throwable $th) {

                    }
                }else{
                    try {
                        Mail::send('email.passive_mail', ['user_name'=>$commission_user->name,'amount'=>$commission_amount,'comes_from'=>$this->email], function($message) use($commission_user){
                            $message->to($commission_user->email);
                            $message->subject('RichIND Notification');
                        });
                        $this->email = $commission_user;
                    } catch (\Throwable $th) {

                    }
                }
            }
        }
        session()->forget('referrer_code');
        Auth::login($user);
        $amount = $plan_purchase->total_amount;
        return redirect()->route('thank.you',compact('user','amount'));
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

                array_push($user_arr,$commission_user->id);
                $referral_code = $commission_user->referral_code;

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
                //     // $level_up_wallet->amount = ($commission_amount*10)/100;
                //     $level_up_wallet->amount = 0;
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

                if($i == 1){
                    try {
                        Mail::send('email.active_mail', ['user_name'=>$commission_user->name,'amount'=>$commission_amount], function($message) use($commission_user){
                            $this->email = $commission_user;
                            $message->to($commission_user->email);
                            $message->subject('RichIND Notification');
                        });
                    } catch (\Throwable $th) {

                    }
                }else{
                    try {
                        $user = User::where('referrer_code',$commission_user->referral_code)->first();
                        Mail::send('email.passive_mail', ['user_name'=>$commission_user->name,'amount'=>$commission_amount,'comes_from'=>$this->email], function($message) use($commission_user){
                            $message->to($commission_user->email);
                            $message->subject('RichIND Notification');
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
                            $this->email = $commission_user;
                            $message->to($commission_user->email);
                            $message->subject('RichIND Notification');
                        });
                    } catch (\Throwable $th) {

                    }
                }else{
                    try {
                        $user = User::where('referrer_code',$commission_user->referral_code)->first();
                        Mail::send('email.passive_mail', ['user_name'=>$commission_user->name,'amount'=>$commission_amount,'comes_from'=>$this->email], function($message) use($commission_user){
                            $message->to($commission_user->email);
                            $message->subject('RichIND Notification');
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

    public function cashPayment(){
        $registration_error_log_id = \Session::get('registration_error_log_id');
        $id = $registration_error_log_id;
        $registration_error_log = RegistrationErrorLog::find(decrypt($registration_error_log_id));
        $plan = Plan::find($registration_error_log->plan);
        return view('cash_payment_verification',compact('id','registration_error_log','plan'));
    }

    public function cashPaymentVerify(Request $request,$id){
        $this->validate($request, [
            'payment_id' => 'required|digits:12|unique:registration_error_logs',
        ]);

        $registration_error_log = RegistrationErrorLog::where('id',decrypt($id))->first();

        $registration_error_log->payment_image = imageUpload($request->file('payment_image'),'frontend/images/payment_image/');
        $registration_error_log->payment_id = $request->payment_id;
        $registration_error_log->error = 'Payment Verification';
        $registration_error_log->save();

        return redirect()->route('cashthank_you')->with('success','Request Has beed Submitted!');
    }

    public function walletReferrelRequest(Request $request){
        $registration_error_log_id = \Session::get('registration_error_log_id');
        $registration_error_log = RegistrationErrorLog::find(decrypt($registration_error_log_id));

        if(!$registration_error_log){
            return redirect()->route('index')->with('error','Something went wrong!');
        }
        $wallet_registration_request = new WalletRegistrationRequest;
        $wallet_registration_request->name = $registration_error_log->name;
        $wallet_registration_request->email = $registration_error_log->email;
        $wallet_registration_request->phone = $registration_error_log->phone;
        $wallet_registration_request->state = $registration_error_log->state;
        $wallet_registration_request->plan = $registration_error_log->plan;
        $wallet_registration_request->referral_code = $registration_error_log->referral_code;
        $wallet_registration_request->password = $registration_error_log->password;
        $wallet_registration_request->save();

        RegistrationErrorLog::where('email',$registration_error_log->email)->delete();

        return redirect()->route('wallet.request.confirmation',encrypt($wallet_registration_request->id));
    }

    public function walletRequestConfirmation($id){
        if($id){
            $registration_error_log = WalletRegistrationRequest::find(decrypt($id));

            return view('wallet_request_confirmation',compact('registration_error_log'));
        }else{
            return redirect()->route('index')->with('error','First Register Your Self!');
        }
    }
}
