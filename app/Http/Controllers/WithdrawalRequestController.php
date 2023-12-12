<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use App\Models\Commission;
use App\Models\Admin\Payout;
use Illuminate\Http\Request;
use App\Models\WithdrawalRequest;

class WithdrawalRequestController extends Controller
{

    public function index(Request $request){
        $search_date = $request->search_date;
        $search_status = $request->search_status;

        $withdrawal_requests = WithdrawalRequest::where('user_id',Auth::guard('web')->user()->id);

        if($search_date){
            $dates=explode('-',$search_date);
            $d1=strtotime($dates[0]);
            $d2=strtotime($dates[1]);
            $da1=date('Y-m-d',$d1);
            $da2=date('Y-m-d',$d2);
            $startDate = Carbon::createFromFormat('Y-m-d', $da1)->startOfDay();
            $endDate = Carbon::createFromFormat('Y-m-d', $da2)->endOfDay();

            $search_date=$dates[0].' - '.$dates[1];
            $withdrawal_requests = $withdrawal_requests->whereBetween('created_at', [$startDate, $endDate]);
        }
        if($search_status){
            $withdrawal_requests = $withdrawal_requests->where('status',$search_status);
        }

        $withdrawal_requests = $withdrawal_requests->latest()->paginate(10);

        return view('user_dashboard.withdrawal_request',compact('search_date','search_status','withdrawal_requests'));
    }

    public function store(Request $request){
        $withdrawal_request = WithdrawalRequest::where('user_id',Auth::guard('web')->user()->id)->latest()->first();
        if($withdrawal_request){
            if($withdrawal_request->status == 'pending'){
                return back()->with('error','You have Previous Request Pending!');
            }else{
                if($request->amount <= Auth::guard('web')->user()->userDetail->total_wallet_balance){
                    $withdrawal_request = new WithdrawalRequest;
                    $withdrawal_request->user_id = Auth::guard('web')->user()->id;
                    $withdrawal_request->amount = $request->amount;
                    $withdrawal_request->save();

                    return back()->with('success','Your Request Submitted Successfully!');
                }else{
                    return back()->with('error','You have Insufficient Balance!');
                }
            }
        }else{
            if($request->amount <= Auth::guard('web')->user()->userDetail->total_wallet_balance){
                $withdrawal_request = new WithdrawalRequest;
                $withdrawal_request->user_id = Auth::guard('web')->user()->id;
                $withdrawal_request->amount = $request->amount;
                $withdrawal_request->save();

                return back()->with('success','Your Request Submitted Successfully!');
            }else{
                return back()->with('error','You have Insufficient Balance!');
            }
        }
    }

}
