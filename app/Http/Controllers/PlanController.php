<?php

namespace App\Http\Controllers;

use App\Models\User;
use Razorpay\Api\Api;
use App\CPU\PlanManager;
use App\CPU\CouponManager;
use App\Models\Admin\Plan;
use App\Models\Commission;
use App\Models\PlanPurchase;
use Illuminate\Http\Request;
use App\Models\Admin\UserDetail;
use App\Models\Admin\WebsiteSetting;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\InstamojoController;

class PlanController extends Controller
{

    public function index()
    {
        $plans = PlanManager::withoutTrash()->where('status',1)->get();
        $current_plan = UserDetail::where('user_id',Auth::guard('web')->user()->id)->with('plan')->first();
        return view('user_dashboard.plan.index',compact('plans','current_plan'));
    }

    public function planDetail($slug)
    {
        $plan_detail = PlanManager::withoutTrash()->where('slug',$slug)->first();

        return view('frontend.course_details',compact('plan_detail'));
    }

    // public function upgradePlanPayment(Request $request)
    // {
    //     $input = $request->all();

    //     $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

    //     $payment = $api->payment->fetch($request->razorpay_payment_id);

    //     if(count($input)  && !empty($request->razorpay_payment_id)) {
    //         $payment_detalis = null;
    //         try {
    //             $response = $api->payment->fetch($request->razorpay_payment_id)->capture(array('amount'=>$payment['amount']));
    //             $payment_detalis = json_encode(array('id' => $response['id'],'method' => $response['method'],'amount' => $response['amount']/100,'currency' => $response['currency']));
    //             $request->request->add(['upgrade_plan_id' => $request->upgrade_plan_id,'payment_detalis' => $payment_detalis]);
    //             return $this->upgradePlan($request);

    //         } catch (\Exception $e) {
    //             return  $e->getMessage();
    //             \Session::put('error',$e->getMessage());
    //             return redirect()->back();
    //         }
    //     }

    //     return json_decode($payment_detalis);
    // }

    // public function upgradePlanPayment(Request $request)
    // {
    //     if(Auth::guard('web')->user()->phone){
    //         $instamojo = new InstamojoController;
    //         return $instamojo->upgrade_plan($request);
    //     }else{
    //         return response()->json(['msg'=>'Update Your Phone Number!'],422);
    //     }
    // }

    public function upgradePlanPayment(Request $request)
    {
        if(Auth::guard('web')->user()->phone){
            $phonepe = new PhonepeController;
            return $phonepe->payWithPhonePeUpdate($request);
        }else{
            return response()->json(['msg'=>'Update Your Phone Number!'],422);
        }
    }

    public function upgradePlan(Request $request)
    {
        $user_detail = UserDetail::where('user_id',Auth::guard('web')->user()->id)->first();
        $current_plan = Plan::where('id',$user_detail->current_plan_id)->first();
        $upgrade_plan_detail = Plan::where('id',$request->upgrade_plan_id)->first();

        $plan_purchase = new PlanPurchase;
        $plan_purchase->user_id = Auth::guard('web')->user()->id;
        $plan_purchase->plan_id = $request->upgrade_plan_id;
        $plan_purchase->course_ids = $upgrade_plan_detail->course_ids;
        $plan_purchase->payment_detail = $request->payment_detalis;
        $plan_purchase->amount = $current_plan->upgrade_amount[$upgrade_plan_detail->priority - $current_plan->priority - 1];
        $total_amount = $current_plan->upgrade_amount[$upgrade_plan_detail->priority - $current_plan->priority - 1];
        $today_date = date('Y-m-d').' 00:00:00';
        $coupon = CouponManager::withoutTrash()->where('name',$request->coupon)->where('is_active','1')->where('start','<=',$today_date)->where('end','>=',$today_date)->where('type','upgrade')->first();
        if($coupon){
            $current_user_plan = Auth::guard('web')->user()->userDetail->current_plan_id;
            $upgrade_plan = $current_user_plan."-".$request->upgrade_plan_id;
            $is_valid = 'not_valid';
            foreach($coupon->plan_ids as $plan_id){
                if($upgrade_plan == $plan_id){
                    $is_valid = 'valid';
                }else{
                    $is_valid = 'not_valid';
                }
            }
            if($is_valid == 'valid'){
                $plan_purchase->coupon_detail = $coupon;
                $plan_purchase->coupon_discount_amount = $coupon->amount;
                $total_amount = $total_amount - $coupon->amount;
            }
        }


        $user_detail->current_plan_id = $request->upgrade_plan_id;
        $user_detail->save();

        $plan_purchase->total_amount = $total_amount;

        $plan_purchase->payment_status = 'success';
        $plan_purchase->save();

        $upgrade_commission_level = WebsiteSetting::where('type','upgrade_commission_level')->first();

        $referrer_code = Auth::guard('web')->user()->referral_code;

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

        return redirect()->route('user.plan')->with('success','Plan Updated Successfully!');
    }

    public function planIndex(){
        $plans = PlanManager::withoutTrash()->where('status',1)->orderBy('priority','desc')->get();
        return view('frontend.plan',compact('plans'));
    }

    public function checkUpgradeCoupon(Request $request){
        $today_date = date('Y-m-d').' 00:00:00';
        $coupon = CouponManager::withoutTrash()->where('name',$request->coupon)->where('is_active','1')->where('start','<=',$today_date)->where('end','>=',$today_date)->where('type','upgrade')->first();
        if($coupon){
            $current_user_plan = Auth::guard('web')->user()->userDetail->current_plan_id;
            $upgrade_plan = $current_user_plan."-".$request->plan_id;
            $is_valid = 'not_valid';
            foreach($coupon->plan_ids as $plan_id){
                if($upgrade_plan == $plan_id){
                    $is_valid = 'valid';
                }else{
                    $is_valid = 'not_valid';
                }
            }
            if($is_valid == 'valid'){
                return $coupon;
            }else{
                return response()->json(['msg'=>'Invalid Coupon Code!'], 401);
            }
        }else{
            return response()->json(['msg'=>'Invalid Coupon Code!'], 401);
        }
    }

}
