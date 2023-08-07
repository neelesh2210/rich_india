<?php

namespace App\Http\Controllers\Admin;

use DB;
use Carbon\Carbon;
use App\Models\User;
use App\CPU\UserManager;
use App\Models\Admin\Payout;
use Illuminate\Http\Request;
use App\Models\Admin\OldPayout;
use App\Models\Admin\FaildPayout;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Pagination\LengthAwarePaginator;

class PayoutController extends Controller
{

    public function index(Request $request){
        $search_key =  $request->search_key;
        $total_remaining_earning = 0;

        $users =  User::select('users.*', 'commission_sum_commission', DB::raw('IFNULL(payout_sum_amount, 0) as payout_sum_amount'), DB::raw('(commission_sum_commission - IFNULL(payout_sum_amount, 0)) AS balance'))
        ->join(DB::raw('(SELECT user_id, SUM(commission) AS commission_sum_commission FROM commissions WHERE commission > 0 AND delete_status = \'0\' GROUP BY user_id) AS commissions'), 'users.id', '=', 'commissions.user_id')
        ->leftJoin(DB::raw('(SELECT user_id, SUM(amount) AS payout_sum_amount FROM payouts GROUP BY user_id) AS payouts'), 'users.id', '=', 'payouts.user_id')
        ->where('users.delete_status', '0')
        ->orderBy('users.created_at','desc')
        ->having('balance', '>', 0);

        if($search_key){
            $users = $users->where(function($query) use ($search_key){
                $query->where('name','like','%'.$search_key.'%')
                ->orWhere('email',$search_key)
                ->orWhere('phone',$search_key)
                ->orWhere('referrer_code',$search_key);
            });
        }
        $total_remaining_earning = $users->sum('balance');
        $users = $users->paginate(10);

        return view('admin.payout.index',compact('users','search_key','total_remaining_earning'),['page_title'=>'Payouts']);
    }

    public function store(Request $request){

        $user = User::where('id',$request->user_id)->first();
        if($request->payment_type=='online'){
            if(optional($user->bankDetail)->upi_id){
                $data = razorpay_payout_upi($user, $request->amount);
            }elseif(optional($user->bankDetail)->account_number){
                $data = razorpay_payout_bank($user, $request->amount);
            }else{
                return back()->with('error','Use Have no Account Details.');
            }

            $payout_details=$data;
            $response=json_decode($payout_details);
            if($response->error->code != 'BAD_REQUEST_ERROR'){
                $payout = new Payout;
                $payout->user_id = $request->user_id;
                $payout->amount = $request->amount;
                $payout->payment_type = $request->payment_type;
                $payout->remark = $request->remark;
                $payout->payment_status = 'success';
                $payout->payment_detail = $payout_details;
                $payout->save();
                try {
                    Mail::send('email.payout', ['user_name'=>$user->name,'amount'=>$request->amount], function($message) use($user){
                        $message->to($user->email);
                        $message->subject('RichIND Notification');
                    });
                } catch (\Throwable $th) {
                    //throw $th;
                }
            }else{
                return back()->with('error','Incorrent Bank Detail...');
            }
        }else{
            $payout = new Payout;
            $payout->user_id = $request->user_id;
            $payout->amount = $request->amount;
            $payout->payment_type = $request->payment_type;
            $payout->remark = $request->remark;
            $payout->payment_status = 'success';
            $payout->save();

            try {
                Mail::send('email.payout', ['user_name'=>$user->name,'amount'=>$request->amount], function($message) use($user){
                    $message->to($user->email);
                    $message->subject('RichIND Notification');
                });
            } catch (\Throwable $th) {
                //throw $th;
            }
        }

        return back()->with('success','Payout Paid Successfully!');
    }

    public function withdrawal(Request $request){
        $search_date = $request->search_date;
        $search_key = $request->search_key;

        $withdrawals = Payout::orderBy('created_at','desc');

        if($search_date){
            $dates=explode('-',$search_date);
            $d1=strtotime($dates[0]);
            $d2=strtotime($dates[1]);
            $da1=date('Y-m-d',$d1);
            $da2=date('Y-m-d',$d2);
            $startDate = Carbon::createFromFormat('Y-m-d', $da1)->startOfDay();
            $endDate = Carbon::createFromFormat('Y-m-d', $da2)->endOfDay();

            $search_date=$dates[0].' - '.$dates[1];
            $withdrawals = $withdrawals->whereBetween('created_at', [$startDate, $endDate]);
        }
        if($search_key){
            $withdrawals = $withdrawals->whereHas('user', function($q) use ($search_key){
                $q->where('phone',$search_key)->orWhere('email','like','%'.$search_key.'%');
            });
        }
        $withdrawals = $withdrawals->paginate(10);

        return view('admin.payout.withdrawal',compact('withdrawals','search_date','search_key'),['page_title'=>'Withdrawals']);
    }

    public function paginate($items, $perPage = 15, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, ['path'=>route('admin.payout.index')]);
    }

    public function payoutTransactionIndex(Request $request){

        $search_key = $request->search_key;
        $search_date = $request->search_date;

        $payouts = Payout::orderBy('id','desc');

        if($search_key){
            $payouts = $payouts->whereHas('user', function($q) use ($search_key){
                $q->where('email','like','%'.$search_key.'%')->orWhere('referrer_code',$search_key)->orWhere('name','like','%'.$search_key.'%');
            });
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
            $payouts = $payouts->whereBetween('created_at', [$startDate, $endDate]);
        }

        $payouts = $payouts->paginate(10);

        return view('admin.payout_transaction.index',compact('payouts','search_key','search_date'),['page_title'=>'Success Payout Transaction']);
    }

    public function failedpayoutTransactionIndex(Request $request){
        $search_key = $request->search_key;
        $search_date = $request->search_date;

        $payouts = FaildPayout::orderBy('id','desc');

        if($search_key){
            $payouts = $payouts->whereHas('user', function($q) use ($search_key){
                $q->where('email','like','%'.$search_key.'%')->orWhere('referrer_code',$search_key);
            });
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
            $payouts = $payouts->whereBetween('created_at', [$startDate, $endDate]);
        }

        $payouts = $payouts->paginate(10);

        return view('admin.failed_payout_transaction.index',compact('payouts','search_key','search_date'),['page_title'=>'Failed Payout Transaction']);
    }

    public function oldPayout(Request $request)
    {
        $user = User::where('id',$request->user_id)->with('userDetail')->first();
        if($request->payment_type=='online'){
            if(optional($user->bankDetail)->upi_id){
                $data = razorpay_payout_upi($user, $request->amount);
            }elseif(optional($user->bankDetail)->account_number){
                $data = razorpay_payout_bank($user, $request->amount);
            }else{
                return back()->with('error','Use Have no Account Details.');
            }

            $payout_details=$data;
            $response=json_decode($payout_details);
            if($response->error->code != 'BAD_REQUEST_ERROR'){
                $payout = new OldPayout;
                $payout->user_id = $request->user_id;
                $payout->amount = $request->amount;
                $payout->payment_type = $request->payment_type;
                $payout->remark = $request->remark;
                $payout->payment_status = 'success';
                $payout->payment_detail = $payout_details;
                $payout->save();

                try {
                    Mail::send('email.payout', ['user_name'=>$user->name,'amount'=>$request->amount], function($message) use($user){
                        $message->to($user->email);
                        $message->subject('RichIND Notification');
                    });
                } catch (\Throwable $th) {
                    //throw $th;
                }
            }else{
                return back()->with('error','Incorrent Bank Detail...');
            }
        }else{
            $payout = new OldPayout;
            $payout->user_id = $request->user_id;
            $payout->amount = $request->amount;
            $payout->payment_type = $request->payment_type;
            $payout->remark = $request->remark;
            $payout->payment_status = 'success';
            $payout->save();

            try {
                Mail::send('email.payout', ['user_name'=>$user->name,'amount'=>$request->amount], function($message) use($user){
                    $message->to($user->email);
                    $message->subject('RichIND Notification');
                });
            } catch (\Throwable $th) {
                //throw $th;
            }
        }

        if($payout->payment_status=='success'){
            $user->userDetail->old_not_paid_payout -= $payout->amount;
            $user->userDetail->old_paid_payout += $payout->amount;
            $user->userDetail->save();
        }

        return back()->with('success','Payout Paid Successfully!');
    }
}
