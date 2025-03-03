<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Admin\Payout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PayoutController extends Controller
{

    public function index(Request $request){
        $search_date = $request->search_date;

        $payouts = Payout::where('user_id',Auth::guard('web')->user()->id)->where('is_show','1');
        if($search_date){
            $dates=explode('-',$search_date);
            $d1=strtotime($dates[0]);
            $d2=strtotime($dates[1]);
            $da1=date('Y-m-d',$d1);
            $da2=date('Y-m-d',$d2);
            $startDate = Carbon::createFromFormat('Y-m-d', $da1)->startOfDay();
            $endDate = Carbon::createFromFormat('Y-m-d', $da2)->endOfDay();

            $search_date=$dates[0].' - '.$dates[1];
            $payouts = $payouts->whereBetween('created_at', [$startDate, $endDate]);
        }
        $payouts = $payouts->orderBy('created_at','desc')->paginate(10);
        return view('user_dashboard.payment.payouts',compact('payouts','search_date'));
    }

}
