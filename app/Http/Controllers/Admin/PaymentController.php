<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Commission;
use App\Models\Admin\Payout;
use App\Models\PlanPurchase;
use Illuminate\Http\Request;
use App\Jobs\DownloadOrderExcel;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\Exports\PaymentTransactionsExport;

class PaymentController extends Controller
{

    public function index(Request $request){
        $search_date = $request->search_date;
        $search_key = $request->search_key;
        $search_plan = $request->search_plan;
        $search_have_sponser  = $request->search_have_sponser;

        $plan_purchases = PlanPurchase::where('delete_status','0');

        if($search_date){
            $dates=explode('-',$search_date);
            $d1=strtotime($dates[0]);
            $d2=strtotime($dates[1]);
            $da1=date('Y-m-d',$d1);
            $da2=date('Y-m-d',$d2);
            $startDate = Carbon::createFromFormat('Y-m-d', $da1)->startOfDay();
            $endDate = Carbon::createFromFormat('Y-m-d', $da2)->endOfDay();

            $search_date=$dates[0].' - '.$dates[1];
            $plan_purchases = $plan_purchases->whereBetween('created_at', [$startDate, $endDate]);
        }
        if($search_plan){
            $plan_purchases = $plan_purchases->whereHas('plan', function($q) use ($search_plan){
                $q->where('id',$search_plan);
            });
        }
        if($search_have_sponser  == 'no_sponser'){
            $plan_purchases = $plan_purchases->whereHas('user', function($q){
                $q->whereNull('referral_code');
            });
        }
        if($search_have_sponser  == 'have_sponser'){
            $plan_purchases = $plan_purchases->whereHas('user', function($q){
                $q->wherenOTNull('referral_code');
            });
        }
        if($search_key){
            $plan_purchases = $plan_purchases->whereHas('user', function($q) use ($search_key){
                $q->where('phone',$search_key)->orWhere('name','like','%'.$search_key.'%')->orWhere('email',$search_key);
            });
        }
        if($request->has('export')){
            $plan_purchases = $plan_purchases->with(['plan','user.sponsorDetail','commission'])->orderBy('created_at','desc')->get();
            return Excel::download(new PaymentTransactionsExport($plan_purchases), 'orders.xlsx');
        //     DownloadOrderExcel::dispatch($plan_purchases);

        // //     sleep(10); // Wait for the job to complete, adjust the time as needed

        // // return Storage::disk('public')->download('orders.xlsx');
            return back()->with('success', 'Export job has been dispatched.');
        }else{
            $plan_purchases = $plan_purchases->with(['user.sponsorDetail','plan','commission.user'])->orderBy('id','desc')->simplePaginate('10');
            return view('admin.payment_transaction.index',compact('plan_purchases','search_date','search_key','search_plan','search_have_sponser'),['page_title'=>'Orders']);
        }

    }

    public function destroy($id){
        $plan_purchase = PlanPurchase::find($id);

        $user = User::where('id',$plan_purchase->user_id)->first();
        $referrals = User::where('referral_code',$user->referrer_code)->first();
        $payouts = Payout::where('user_id',$user->id)->first();

        if(!$referrals){
            if(!$payouts){
                $user->delete_status = '1';
                $user->save();
                $plan_purchase->delete_status = '1';
                $plan_purchase->save();
                $commission = Commission::where('plan_purchase_id',$plan_purchase->id)->update(['delete_status'=>'1']);
                return back()->with("error","Order Deleted Succfully!");
            }else{
                return back()->with("error","User Have Payouts so You can't Delete this Order");
            }
        }else{
            return back()->with("error","User Have Referrals so You can't Delete this Order");
        }
    }

    public function invoice($id){
        $payment = PlanPurchase::with(['user','plan'])->find($id);

        return view('admin.payment_transaction.invoice',compact('payment'),['page_title'=>'Payment Invoice']);
    }

}
