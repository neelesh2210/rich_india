<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Commission;
use App\Models\Admin\Target;
use Illuminate\Http\Request;

class QualificationController extends Controller
{

    public function index(){
        $targets = Target::latest()->get();

        return view('user_dashboard.qualification',compact('targets'));
    }

    public function show($id){
        $target = Target::where('id',$id)->first();

        $commission = Commission::where('user_id',Auth::guard('web')->user()->id)->whereBetween('created_at', [$target->start_date, $target->end_date])->where('level', 1)->sum('commission');
        $remaining_commission = $target->amount - $commission;

        $total_affiliate_user = User::where('referral_code',Auth::guard('web')->user()->referrer_code)->whereBetween('created_at', [$target->start_date, $target->end_date])->count();

        if($target->amount == 0){
            $commission_percent = 0;
        }else{
            if($remaining_commission <= 0){
                $commission_percent = 100;
            }else{
                $commission_percent = round((($commission)/$target->amount)*100);
            }
        }

        if($target->no_of_referral == 0){
            $user_percent = 0;
        }else{
            if($total_affiliate_user >= $target->no_of_referral){
                $user_percent = 100;
            }else{
                $user_percent = round(($total_affiliate_user/$target->no_of_referral)*100);
            }
        }

        $avg_percent = round(($commission_percent+$user_percent)/2);

        return view('user_dashboard.qualification_details',compact('target','remaining_commission','total_affiliate_user','avg_percent', 'commission'));
    }

}
