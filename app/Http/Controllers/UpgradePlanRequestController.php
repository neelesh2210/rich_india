<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin\Plan;
use Illuminate\Http\Request;
use App\Models\UpgradePlanRequest;
use Illuminate\Support\Facades\Auth;

class UpgradePlanRequestController extends Controller
{

    public function index(){
        $list = UpgradePlanRequest::where('request_user_id',Auth::guard('web')->user()->id)->with(['user.userDetail','plan'])->orderBy('id','desc')->paginate(10);

        return view('user_dashboard.upgrade_plan_request.index',compact('list'));
    }

    public function store(Request $request){
        if(!UpgradePlanRequest::where('user_id',Auth::guard('web')->user()->id)->where('status','pending')->first()){
            $plan = Plan::where('id',$request->plan_id)->first();
            $referrel_user = User::where('referrer_code',Auth::guard('web')->user()->referral_code)->first();
            if($referrel_user){
                if(Auth::guard('web')->user()->userDetail->current_plan_id < $plan->priority){
                    $upgrade_plan_request = new UpgradePlanRequest;
                    $upgrade_plan_request->user_id = Auth::guard('web')->user()->id;
                    $upgrade_plan_request->request_user_id = $referrel_user->id;
                    $upgrade_plan_request->plan_id = $request->plan_id;
                    $upgrade_plan_request->save();
                }else{
                    return response()->json(['message'=>'Request Plan is lower then current plan'],401);
                }
            }else{
                return response()->json(['message'=>'You Have no Referrar!'],401);
            }
        }else{
            return response()->json(['message'=>'You Have Previous Request Pending!'],401);
        }
    }

    public function show($id){
        $data = UpgradePlanRequest::where('request_user_id',Auth::guard('web')->user()->id)->where('id',decrypt($id))->with(['user.userDetail','plan'])->first();

        return view('user_dashboard.upgrade_plan_request.show',compact('data'));
    }

    public function update(Request $request,$id){
        return decrypt($id);
    }

}
