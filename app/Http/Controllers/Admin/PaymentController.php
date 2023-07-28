<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Commission;
use App\Models\Admin\Payout;
use App\Models\PlanPurchase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PaymentTransactionsExport;

class PaymentController extends Controller
{

    public function index(Request $request){
        $search_date = $request->search_date;
        $search_key = $request->search_key;
        $search_plan = $request->search_plan;
        $search_have_sponser  = $request->search_have_sponser;

        $plan_purchases = PlanPurchase::where('delete_status','0')->with(['user.sponsorDetail','plan']);

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
            $plan_purchases = $plan_purchases->orderBy('created_at','desc')->get();
            return Excel::download(new PaymentTransactionsExport($plan_purchases), 'orders.xlsx');
        }else{
            $plan_purchase_id   = $plan_purchases->pluck('id');
            $total_sell =  $plan_purchases->sum('total_amount');
            $total_commission =  Commission::where('user_id','!=',1)->whereIn('plan_purchase_id',$plan_purchase_id)->get()->sum('commission');
            $plan_purchases = $plan_purchases->withSum('commission','commission')->orderBy('id','desc')->paginate('10');
            return view('admin.payment_transaction.index',compact('plan_purchases','search_date','search_key','search_plan','total_sell','total_commission','search_have_sponser'),['page_title'=>'Orders']);
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

}
