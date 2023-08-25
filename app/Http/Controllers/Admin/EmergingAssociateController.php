<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\CPU\UserManager;
use App\Models\Commission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmergingAssociateController extends Controller
{

    public function index(Request $request){
        $search_date = $request->search_date;
        $search_key = $request->search_key;
        $users = UserManager::withoutTrash()->where('status','1');

        if($search_date){
            $dates=explode('-',$search_date);
            $d1=strtotime($dates[0]);
            $d2=strtotime($dates[1]);
            $da1=date('Y-m-d',$d1);
            $da2=date('Y-m-d',$d2);
            $startDate = Carbon::createFromFormat('Y-m-d', $da1)->startOfDay();
            $endDate = Carbon::createFromFormat('Y-m-d', $da2)->endOfDay();

            $search_date=$dates[0].' - '.$dates[1];

            $users = $users->whereBetween('created_at',[$startDate,$endDate]);
        }else{
            $startDate = Carbon::now()->subMonth(2)->startOfMonth()->toDateString();
            $endDate = Carbon::now()->subMonth(2)->endOfMonth()->toDateString();

            $search_date=date('m/d/Y',strtotime($startDate)).' - '.date('m/d/Y',strtotime($endDate));

            $users = $users->whereBetween('created_at',[$startDate,$endDate]);
        }

        if($search_key){
            $users=$users->where(function ($query) use ($search_key){
                $query->where('name','like','%'.$search_key.'%')
                      ->orWhere('email','like','%'.$search_key.'%')
                      ->orWhere('phone','like','%'.$search_key.'%')
                      ->orWhere('referrer_code','like','%'.$search_key.'%');
            });
        }
        $users=$users->with(['sponsorDetail','userDetail.plan'])->withCount('associates')->withSum('payout','amount')->withSum('commission','commission')->orderby('commission_sum_commission','desc')->paginate(10);


        return view('admin.emerging_associate.index',compact('users','search_date','search_key'),['page_title'=>'Emerging Associates']);
    }

}
