<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\Admin\Plan;
use App\Models\Commission;
use App\Models\PlanPurchase;
use Illuminate\Bus\Queueable;
use App\Models\Admin\UserDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use App\Models\Admin\CommissionSetting;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ImportUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //Update Plan Course
        // $plan_purchases = PlanPurchase::whereBetween('id',[1,3252])->get();
        // foreach ($plan_purchases as $plan_purchase) {
        //     $plan = Plan::where('id',$plan_purchase->plan_id)->first();
        //     $plan_purchase->course_ids = $plan->course_ids;
        //     $plan_purchase->save();
        // }

        // return 1;

        //Insert New User

        // $wp_users = DB::table('wp_users')->get();

        // foreach($wp_users as $wp_user){
        //     $wp_user_detail = DB::table('wp_wc_customer_lookup')->where('user_id',$wp_user->ID)->first();
        //     if($wp_user_detail){
        //         $wp_affiliates_id = DB::table('wp_uap_affiliates')->where('uid',$wp_user->ID)->first();
        //         if($wp_affiliates_id){
        //             $wp_order = DB::table('wp_wc_order_stats')->where('customer_id',$wp_user_detail->customer_id)->where(function ($query) {
        //                             $query->where('status','wc-completed')->orWhere('status','wc-on-hold');
        //                         })->first();
        //             if($wp_order){
        //                 $wp_order_details = DB::table('wp_woocommerce_order_items')->where('order_id',$wp_order->order_id)->first();
        //                 if($wp_order_details){
        //                     $plan = Plan::where('title',$wp_order_details->order_item_name)->first();
        //                     if($plan){
        //                         $wp_parent_id = DB::table('wp_uap_mlm_relations')->where('affiliate_id',$wp_affiliates_id->id)->first();
        //                         $check_user = User::where('email',$wp_user->user_email)->first();
        //                         if(!$check_user){
        //                             $user = new User;
        //                             $user->added_by = 'admin' ;
        //                             $user->name = optional($wp_user_detail)->first_name.' '.optional($wp_user_detail)->last_name;
        //                             $user->email = $wp_user->user_email ;
        //                             $user->state = optional($wp_user_detail)->city;
        //                             $user->referrer_code = $wp_user->user_login ;
        //                             $user->password = Hash::make($wp_user->user_email );
        //                             if($wp_parent_id){
        //                                 $ref_wp_affiliate = DB::table('wp_uap_affiliates')->where('id',$wp_parent_id->parent_affiliate_id)->first();
        //                                 $ref_wp_user = DB::table('wp_users')->where('id',optional($ref_wp_affiliate)->uid)->first();

        //                                 $user->referral_code = optional($ref_wp_user)->user_login ;
        //                             }
        //                             $user->is_old = '1';
        //                             $user->save();

        //                             $plan_purchase = new PlanPurchase;
        //                             $plan_purchase->user_id = $user->id;
        //                             $plan_purchase->plan_id = $plan->id;
        //                             $plan_purchase->course_ids = $plan->course_ids;
        //                             //$plan_purchase->amount = $plan->amount;
        //                             // if($user->referral_code){
        //                             //     $plan_purchase->discounted_amount = $plan->amount - $plan->discounted_price;
        //                             //     $plan_purchase->total_amount = $plan->discounted_price;
        //                             // }else{
        //                             //     $plan_purchase->total_amount = $plan->amount;
        //                             // }
        //                             //$plan_purchase->payment_detail = $request->payment_detalis;
        //                             $plan_purchase->payment_status = 'success';
        //                             $plan_purchase->save();

        //                             $user_detail = new UserDetail;
        //                             $user_detail->user_id = $user->id;
        //                             $user_detail->current_plan_id = $plan_purchase->plan_id;
        //                             $user_detail->save();

        //                             // if($user->referral_code){
        //                             //         $this->distributeCommission($user->referral_code,$plan->id,$plan_purchase->id,$user);
        //                             // }else{
        //                             //     $commission_setting = CommissionSetting::get();
        //                             //     $level = $commission_setting->count();
        //                             //     for($i=1;$i<=$level;$i++){
        //                             //         $commission_user = User::with('userDetail.plan')->first();
        //                             //         if($commission_user->userDetail->plan->priority <= $plan->priority){
        //                             //             $commission_amount = $commission_user->userDetail->plan->commission[$i-1];
        //                             //         }else{
        //                             //             $commission_amount = $plan->commission[$i-1];
        //                             //         }
        //                             //         $commission = new Commission;
        //                             //         $commission->user_id = $commission_user->id;
        //                             //         $commission->plan_purchase_id = $plan_purchase->id;
        //                             //         $commission->commission = $commission_amount;
        //                             //         $commission->level = $i;
        //                             //         $commission->save();

        //                             //         $user_detail = UserDetail::where('user_id',User::first()->id)->first();
        //                             //         $user_detail->total_commission = $user_detail->total_commission + $commission_amount;
        //                             //         $user_detail->save();

        //                             //         // if($i == 1){
        //                             //         //     Mail::send('email.active_mail', ['user_name'=>$commission_user->name,'amount'=>$commission_amount], function($message) use($commission_user){
        //                             //         //         $message->to($commission_user->email);
        //                             //         //         $message->subject('Digiigyan Notification');
        //                             //         //     });
        //                             //         // }else{
        //                             //         //     Mail::send('email.passive_mail', ['user_name'=>$commission_user->name,'amount'=>$commission_amount,'comes_from'=>$user], function($message) use($commission_user){
        //                             //         //         $message->to($commission_user->email);
        //                             //         //         $message->subject('Digiigyan Notification');
        //                             //         //     });
        //                             //         // }
        //                             //     }
        //                             // }
        //                         }
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }

        //Update Plan

        // $users = User::all();

        // foreach ($users as $user){
        //     $wp_customer = DB::table('wpkd_users')->where('user_email',$user->email)->first();
        //     $wp_customer_details = DB::table('wpkd_wc_customer_lookup')->where('user_id',$wp_customer->ID)->first();
        //     if($wp_customer_details){
        //         $wp_orders = DB::table('wpkd_wc_order_stats')->where('customer_id',$wp_customer_details->customer_id)->where(function ($query) {
        //             $query->where('status','wc-completed')->orWhere('status','wc-on-hold');
        //         })->get();

        //         if(count($wp_orders) != 0){
        //             foreach($wp_orders as $key=>$wp_order){
        //                 if($key == 2){
        //                     $user_detail = UserDetail::where('user_id',$user->id)->first();
        //                     $current_plan = Plan::where('id',$user_detail->current_plan_id)->first();
        //                     $wp_order_items = DB::table('wpkd_woocommerce_order_items')->where('order_id',$wp_order->order_id)->where(function ($query) {
        //                         $query->where('order_item_name','Elite to Gold Upgrade')->orWhere('order_item_name','Elite to Silver Upgrade')->orWhere('order_item_name','Silver to Gold Upgrade');
        //                     })->first();
        //                     if($wp_order_items){
        //                         if($wp_order_items->order_item_name =='Elite to Gold Upgrade'){
        //                             $slug = 'gold';
        //                         }elseif($wp_order_items->order_item_name == 'Elite to Silver Upgrade'){
        //                             $slug = 'silver';
        //                         }elseif($wp_order_items->order_item_name == 'Silver to Gold Upgrade'){
        //                             $slug = 'gold';
        //                         }else{
        //                             $slug = '';
        //                         }
        //                         $upgrade_plan_detail = Plan::where('slug',$slug)->first();
        //                         if($upgrade_plan_detail){
        //                             if($user_detail->current_plan_id != $upgrade_plan_detail->id){
        //                                 $user_detail->current_plan_id = $upgrade_plan_detail->id;
        //                                 $user_detail->save();

        //                                 $plan_purchase = new PlanPurchase;
        //                                 $plan_purchase->user_id = $user->id;
        //                                 $plan_purchase->plan_id = $upgrade_plan_detail->id;
        //                                 $plan_purchase->course_ids = $upgrade_plan_detail->course_ids;
        //                                 //$plan_purchase->payment_detail = $request->payment_detalis;
        //                                 //$plan_purchase->amount = $current_plan->upgrade_amount[$upgrade_plan_detail->priority - $current_plan->priority - 1];
        //                                 //$plan_purchase->total_amount = $current_plan->upgrade_amount[$upgrade_plan_detail->priority - $current_plan->priority - 1];
        //                                 $plan_purchase->save();

        //                                 // $commission_user = User::where('referrer_code',$user->referral_code)->first();
        //                                 // if($commission_user){
        //                                 //     $update_commission = UserDetail::where('user_id',$commission_user->id)->first();
        //                                 // }else{
        //                                 //     $update_commission = UserDetail::first();
        //                                 // }

        //                                 // $commission = new Commission;
        //                                 // $commission->user_id = $update_commission->user_id;
        //                                 // $commission->plan_purchase_id = $plan_purchase->id;
        //                                 // $commission->commission = $current_plan->upgrade_commission[$upgrade_plan_detail->priority - $current_plan->priority - 1];
        //                                 // $commission->level = 1;
        //                                 // $commission->save();

        //                                 // $update_commission->total_commission = $update_commission->total_commission + $current_plan->upgrade_commission[$upgrade_plan_detail->priority - $current_plan->priority - 1];
        //                                 // $update_commission->save();
        //                             }
        //                         }
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }


        //Old Data amount

        $users = User::all();
        foreach($users as $user){
            $wp_user = DB::table('wp_users')->where('user_email',$user->email)->first();
            if($wp_user){
                $wp_affiliate_id = DB::table('wp_uap_affiliates')->where('uid',$wp_user->ID)->first();
                if($wp_affiliate_id){
                    $wp_paid_payout = DB::table('wp_uap_referrals')->where('affiliate_id',$wp_affiliate_id->id)->where('payment',2)->get()->sum('amount');
                    $wp_not_paid_payout = DB::table('wp_uap_referrals')->where('affiliate_id',$wp_affiliate_id->id)->where('status',2)->where('payment',0)->get()->sum('amount');

                    UserDetail::where('user_id',$user->id)->update([
                        'old_paid_payout'=>$wp_paid_payout,
                        'old_not_paid_payout'=>$wp_not_paid_payout,
                    ]);

                    // $user->paid_payout = $wp_paid_payout;
                    // $user->not_paid_payout = $wp_not_paid_payout;
                    // $user->total_payout = $wp_paid_payout + $wp_not_paid_payout;
                }
            }
        }

    }

    // public function distributeCommission($referral_code,$plan_id,$plan_purchase_id,$user)
    // {
    //     $commission_setting = CommissionSetting::get();
    //     $level = $commission_setting->count();
    //     $plan = Plan::where('id',$plan_id)->first();
    //     $user_arr = [];
    //     for($i=1;$i<=$level;$i++){
    //         $commission_user = User::where('referrer_code',$referral_code)->with('userDetail.plan')->first();
    //         if($commission_user){
    //             if($commission_user->userDetail->plan->priority <= $plan->priority){
    //                 $commission_amount = $commission_user->userDetail->plan->commission[$i-1];
    //             }else{
    //                 $commission_amount = $plan->commission[$i-1];
    //             }
    //             $commission = new Commission;
    //             $commission->user_id = $commission_user->id;
    //             $commission->plan_purchase_id = $plan_purchase_id;
    //             $commission->commission = $commission_amount;
    //             $commission->level = $i;
    //             $commission->save();

    //             $user_detail = UserDetail::where('user_id',$commission_user->id)->first();
    //             $user_detail->total_commission = $user_detail->total_commission + $commission_amount;
    //             $user_detail->save();

    //             array_push($user_arr,$commission_user->id);
    //             $referral_code = $commission_user->referral_code;
    //             // if($i == 1){
    //             //     Mail::send('email.active_mail', ['user_name'=>$commission_user->name,'amount'=>$commission_amount], function($message) use($commission_user){
    //             //         $message->to($commission_user->email);
    //             //         $message->subject('Digiigyan Notification');
    //             //     });
    //             // }else{
    //             //     Mail::send('email.passive_mail', ['user_name'=>$commission_user->name,'amount'=>$commission_amount,'comes_from'=>$user], function($message) use($commission_user){
    //             //         $message->to($commission_user->email);
    //             //         $message->subject('Digiigyan Notification');
    //             //     });
    //             // }

    //         }else{
    //             $commission_user = User::with('userDetail.plan')->first();
    //             if($commission_user->userDetail->plan->priority <= $plan->priority){
    //                 $commission_amount = $commission_user->userDetail->plan->commission[$i-1];
    //             }else{
    //                 $commission_amount = $plan->commission[$i-1];
    //             }
    //             $commission = new Commission;
    //             $commission->user_id = $commission_user->id;
    //             $commission->plan_purchase_id = $plan_purchase_id;
    //             $commission->commission = $commission_amount;
    //             $commission->level = $i;
    //             $commission->save();

    //             $user_detail = UserDetail::where('user_id',User::first()->id)->first();
    //             $user_detail->total_commission = $user_detail->total_commission + $commission_amount;
    //             $user_detail->save();

    //             // if($i == 1){
    //             //     Mail::send('email.active_mail', ['user_name'=>$commission_user->name,'amount'=>$commission_amount], function($message) use($commission_user){
    //             //         $message->to($commission_user->email);
    //             //         $message->subject('Digiigyan Notification');
    //             //     });
    //             // }else{
    //             //     Mail::send('email.passive_mail', ['user_name'=>$commission_user->name,'amount'=>$commission_amount,'comes_from'=>$user], function($message) use($commission_user){
    //             //         $message->to($commission_user->email);
    //             //         $message->subject('Digiigyan Notification');
    //             //     });
    //             // }
    //         }
    //     }
    // }

}
