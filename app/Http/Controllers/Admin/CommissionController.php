<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Commission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommissionController extends Controller
{

    public function index(Request $request)
    {
        $search_date = $request->search_date;
        $search_plan = $request->search_plan_id;
        $search_key = $request->search_key;

        $commissions = Commission::where('delete_status','0')->with(['purchasePlan.user','purchasePlan.plan','purchasePlan.user.sponsorDetail','user']);

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
                $q->where('phone',$search_key)->orWhere('name','like','%'.$search_key.'%')->orWhere('email','like',$search_key);
            });
        }
        $commissions = $commissions->groupBy('plan_purchase_id')->orderBy('created_at','desc')->paginate(10);
        return view('admin.commission.index',compact('commissions','search_date','search_plan','search_key'),['page_title'=>'Referral Income']);
    }

    public function earning(Request $request){
        $search_date = $request->search_date;
        $search_plan = $request->search_plan_id;
        $search_key = $request->search_key;

        $earnings = Commission::where('delete_status','0')->with(['purchasePlan.user','purchasePlan.plan','purchasePlan.user.sponsorDetail','user']);

        if($search_date){
            $dates=explode('-',$search_date);
            $d1=strtotime($dates[0]);
            $d2=strtotime($dates[1]);
            $da1=date('Y-m-d',$d1);
            $da2=date('Y-m-d',$d2);
            $startDate = Carbon::createFromFormat('Y-m-d', $da1)->startOfDay();
            $endDate = Carbon::createFromFormat('Y-m-d', $da2)->endOfDay();

            $search_date=$dates[0].' - '.$dates[1];
            $earnings = $earnings->whereBetween('created_at', [$startDate, $endDate]);
        }
        if($search_plan){
            $earnings = $earnings->whereHas('purchasePlan.plan', function($q) use ($search_plan){
                $q->where('id',$search_plan);
            });
        }
        if($search_key){
            $earnings = $earnings->whereHas('user', function($q) use ($search_key){
                $q->where('email',$search_key)->orWhere('email','like','%'.$search_key.'%');
            });
        }
        $earnings = $earnings->orderBy('created_at','desc')->paginate(10);
        return view('admin.commission.earning',compact('earnings','search_date','search_plan','search_key'),['page_title'=>'Earnings']);
    }

}
