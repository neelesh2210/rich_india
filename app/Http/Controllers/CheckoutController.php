<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Models\Admin\Plan;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{

    public function checkout(Request $request){
        return redirect()->route('index');
        if(!Auth::check()){
            if(Session::has('referrer_code')){
                $referral_code = Session::get('referrer_code');
            }
            else{
                if($request->referrer_code){
                    $referral_code = $request->referrer_code;
                }else{
                    $referral_code = '';
                }
            }
            $plan_detail = Plan::where('delete_status','0')->where('status','1')->where('slug',$request->slug)->first();
            if($plan_detail){
                $plans = Plan::where('delete_status','0')->where('status','1')->oldest('priority')->get();

                return view('frontend.checkout',compact('plan_detail','referral_code', 'plans'));
            }else{
                return back()->with('error','Select Plan First!');
            }
        }else{
            return back()->with('error','Please Logout Before Creating Another Account!');
        }
    }

    public function getPlanDetail(Request $request){
        $plan = Plan::where('id',$request->plan_id)->first();

        if($plan){
            $plan->discount = $plan->amount - $plan->discounted_price;
            return response()->json(['plan'=>$plan]);
        }else{
            return response()->json(['msg'=>'Plan Not Found!'],422);
        }
    }

}
