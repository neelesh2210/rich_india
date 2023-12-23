<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\PlanPurchase;
use Illuminate\Http\Request;
use App\Models\Admin\UserDetail;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{

    public function totalPendingWalletAmount(){
        $total_pending_wallet_amount = UserDetail::whereHas('user',function($query){
            $query->where('delete_status','0');
        })->sum('total_wallet_balance');

        return view('admin.report.total_wallet_balance',compact('total_pending_wallet_amount'),['page_title'=>'Total Wallet Balance']);
    }

    public function paymentTransaction(){
        $dates = [];
        foreach( range( -6, 0 ) AS $i ) {
            $date = Carbon::now()->addDays( $i )->format( 'Y-m-d' );
            array_push($dates,$date);
        }

        $week_payments=[];
        foreach($dates as $date)
        {
            $payments = PlanPurchase::where('delete_status','0')->whereDate('created_at',$date )->sum('total_amount');
            $week_payments[]=$payments;
        }

        return view('admin.report.payment_transaction',compact('dates','week_payments'),['page_title'=>'Total Wallet Balance']);
    }

}
