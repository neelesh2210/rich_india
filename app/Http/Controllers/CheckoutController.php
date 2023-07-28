<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\CPU\PlanManager;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{

    public function checkout(Request $request)
    {
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
            $plan_detail = PlanManager::withoutTrash()->where('slug',$request->slug)->first();
            $plans = PlanManager::withoutTrash()->select('id','slug','title','amount','points','image','discounted_price')->where('status',1)->get();

            return view('frontend.checkout',compact('plan_detail','referral_code', 'plans'));
        }else{
            return back()->with('error','Please Logout Before Creating Another Account!');
        }
    }

}
