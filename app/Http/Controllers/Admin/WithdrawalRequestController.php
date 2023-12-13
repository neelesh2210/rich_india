<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\UserWallet;
use App\Models\Admin\Payout;
use Illuminate\Http\Request;
use App\Models\Admin\UserDetail;
use App\Models\WithdrawalRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\WithdrawalRequestsExport;

class WithdrawalRequestController extends Controller
{

    public function index(Request $request){
        $search_status = $request->search_status;
        $search_date = $request->search_date;
        $search_key = $request->search_key;

        $withdrawal_requests = WithdrawalRequest::latest()->with('user');

        if($search_status){
            $withdrawal_requests = $withdrawal_requests->where('status',$search_status);
        }
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
        if($search_key){
            $withdrawal_requests = $withdrawal_requests->whereHas('user',function($q) use ($search_key){
                $q->where('name','LIKE','%'.$search_key.'%')
                ->orWhere('email',$search_key)
                ->orWhere('phone',$search_key)
                ->orWhere('referrer_code',$search_key);
            });
        }
        if($request->has('export')){
            $withdrawal_requests = $withdrawal_requests->get();

            return Excel::download(new WithdrawalRequestsExport($withdrawal_requests), 'withdrawal_request.xlsx');
        }else{
            $total_withdrawal_request = $withdrawal_requests->sum('amount');
            $withdrawal_requests = $withdrawal_requests->paginate(10);

            return view('admin.withdrawal_request.index',compact('withdrawal_requests','search_status','search_date','search_key','total_withdrawal_request'),['page_title'=>'Withdrawal Request List']);
        }

    }

    public function stauts(Request $request){
        $withdrawal_request = WithdrawalRequest::find($request->id);
        if($withdrawal_request->status == 'pending'){
            $user = User::find($withdrawal_request->user_id);
            if($request->status == 'cancel'){
                $withdrawal_request->status = $request->status;
                $withdrawal_request->save();

                return back()->with('success','Payout Cancelled Successfully!');
            }
            if($withdrawal_request->amount <= $user->userDetail->total_wallet_balance){
                $withdrawal_request->status = $request->status;
                $withdrawal_request->save();

                if($request->status == 'success'){
                    $payout = new Payout;
                    $payout->user_id = $withdrawal_request->user_id;
                    $payout->amount = $withdrawal_request->amount;
                    $payout->payment_type = 'cash';
                    $payout->payment_status = 'success';
                    $payout->save();

                    $user_wallet = new UserWallet;
                    $user_wallet->user_id = $user->id;
                    $user_wallet->from_id = $payout->id;
                    $user_wallet->amount = $withdrawal_request->amount;
                    $user_wallet->type = 'debit';
                    $user_wallet->from = 'payout';
                    $user_wallet->save();

                    $user_detail = UserDetail::where('user_id',$user->id)->first();
                    $user_detail->total_wallet_balance = $user_detail->total_wallet_balance - $withdrawal_request->amount;
                    $user_detail->save();

                    try {
                        Mail::send('email.payout', ['user_name'=>$user->name,'amount'=>$withdrawal_request->amount], function($message) use($user){
                            $message->to($user->email);
                            $message->subject('Withdrawal Successfull!');
                        });
                    } catch (\Throwable $th) {
                        //throw $th;
                    }
                }
            }else{
                return back()->with('error','User Have Insufficiant Balance!');
            }
            return back()->with('success','Payout Completed Successfully!');
        }else{
            return back()->with('error','Payout Already Completed Successfully!');
        }
    }


}
