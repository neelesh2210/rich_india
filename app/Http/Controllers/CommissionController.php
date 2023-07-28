<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Commission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommissionController extends Controller
{

    public function userCommissionList(Request $request)
    {
        $search_date = $request->search_date;
        $search_plan = $request->search_plan_id;
        $search_key = $request->search_key;

        $commissions = Commission::where('delete_status','0')->where('user_id',Auth::guard('web')->user()->id)->where('commission','!=','0')->with(['purchasePlan.user','purchasePlan.plan','purchasePlan.user.sponsorDetail']);

        if($search_date){
            $dates=explode('-',$search_date);
            $d1=strtotime($dates[0]);
            $d2=strtotime($dates[1]);
            $da1=date('Y-m-d',$d1);
            $da2=date('Y-m-d',$d2);
            $startDate = Carbon::createFromFormat('Y-m-d', $da1)->startOfDay();
            $endDate = Carbon::createFromFormat('Y-m-d', $da2)->endOfDay();

            $search_date=$dates[0].' - '.$dates[1];
            $commissions = $commissions->whereBetween('created_at', [$startDate, $endDate]);
        }
        if($search_plan){
            $commissions = $commissions->whereHas('purchasePlan.plan', function($q) use ($search_plan){
                $q->where('id',$search_plan);
            });
        }
        if($search_key){
            $commissions = $commissions->whereHas('purchasePlan.user', function($q) use ($search_key){
                $q->where('phone',$search_key)->orWhere('name','like','%'.$search_key.'%')->orWhere('email','like','%'.$search_key.'%');
            });
        }
        $commissions = $commissions->orderBy('created_at','desc')->paginate(10);
        return view('user_dashboard.affiliate.traffic',compact('commissions','search_date','search_plan','search_key'));
    }

}
