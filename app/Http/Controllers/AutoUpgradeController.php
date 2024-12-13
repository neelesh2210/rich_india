<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin\Plan;
use App\Models\Commission;
use App\Models\UserWallet;
use App\Models\PlanPurchase;
use Illuminate\Http\Request;
use App\Models\LevelUpWallet;
use App\Models\Admin\UserDetail;
use App\Models\Admin\WebsiteSetting;

class AutoUpgradeController extends Controller
{

    public function upgradePlan($user_id){
        $user = User::where('id',$user_id)->first();
        $user_detail = UserDetail::where('user_id',$user_id)->first();
        $current_plan = Plan::where('id',$user_detail->current_plan_id)->first();
        $higher_plan = Plan::where('delete_status','0')->where('status','1')->latest('priority')->first();

        if($current_plan->priority != $higher_plan->priority){
            $upgrade_plan_detail = Plan::where('priority',$current_plan->priority+1)->first();

            $total_user_level_up_wallet_credit_amount = LevelUpWallet::where('user_id',$user->id)->where('type','credit')->sum('amount');
            $total_user_level_up_wallet_debit_amount = LevelUpWallet::where('user_id',$user->id)->where('type','debit')->sum('amount');
            $total_user_level_up_wallet_remaining_amount = $total_user_level_up_wallet_credit_amount - $total_user_level_up_wallet_debit_amount;

            $upgrade_amount = $current_plan->upgrade_amount[$upgrade_plan_detail->priority - $current_plan->priority - 1];

            if($total_user_level_up_wallet_remaining_amount >= $upgrade_amount){
                $user_detail->current_plan_id = $upgrade_plan_detail->id;
                $user_detail->save();

                $plan_purchase = new PlanPurchase;
                $plan_purchase->user_id = $user->id;
                $plan_purchase->plan_id = $upgrade_plan_detail->id;
                $plan_purchase->course_ids = $upgrade_plan_detail->course_ids;
                $plan_purchase->payment_detail = 'Autoupdated';
                $plan_purchase->amount = $upgrade_amount;
                $plan_purchase->total_amount = $upgrade_amount;
                $plan_purchase->payment_status = 'success';
                $plan_purchase->save();

                LevelUpWallet::create([
                    'user_id'=>$user->id,
                    'from_id'=>$plan_purchase->id,
                    'amount'=>$plan_purchase->total_amount,
                    'type'=>'debit',
                    'from'=>'upgrade'
                ]);

                $upgrade_commission_level = WebsiteSetting::where('type','upgrade_commission_level')->first();

                $referrer_code = $user->referral_code;

                for($i=1;$i<=$upgrade_commission_level->content;$i++){

                    $commission_user = User::where('referrer_code',$referrer_code)->first();

                    if($commission_user){
                        $update_commission = UserDetail::where('user_id',$commission_user->id)->first();
                        $referrer_code = optional(User::where('id',$update_commission->user_id)->first())->referral_code;
                    }else{
                        $update_commission = UserDetail::first();
                        $referrer_code = User::where('id',$update_commission->user_id)->first()->referrer_code;
                    }

                    if($upgrade_plan_detail->priority <= $update_commission->plan->priority ){
                        $commission = new Commission;
                        $commission->user_id = $update_commission->user_id;
                        $commission->plan_purchase_id = $plan_purchase->id;
                        $commission->commission = $current_plan->upgrade_commission[$upgrade_plan_detail->priority - $current_plan->priority - 1][$i-1];
                        $commission->level = $i;
                        $commission->save();

                        $user_wallet = new UserWallet;
                        $user_wallet->user_id = $update_commission->user_id;
                        $user_wallet->from_id = $plan_purchase->id;
                        $user_wallet->amount = $current_plan->upgrade_commission[$upgrade_plan_detail->priority - $current_plan->priority - 1][$i-1];
                        $user_wallet->type = 'credit';
                        $user_wallet->from = 'upgrade';
                        $user_wallet->save();

                        $update_commission->total_commission = $update_commission->total_commission + $current_plan->upgrade_commission[$upgrade_plan_detail->priority - $current_plan->priority - 1][$i-1];
                        $update_commission->total_wallet_balance = $update_commission->total_wallet_balance + $current_plan->upgrade_commission[$upgrade_plan_detail->priority - $current_plan->priority - 1][$i-1];
                        $update_commission->save();

                        if($higher_plan->priority > $update_commission->plan->priority){
                            $level_up_wallet = new LevelUpWallet;
                            $level_up_wallet->user_id = $update_commission->user_id;
                            $level_up_wallet->from_id = $commission->id;
                            $level_up_wallet->amount = ($commission->commission*10)/100;
                            $level_up_wallet->type = 'credit';
                            if($i == 1){
                                $level_up_wallet->from = 'active_commission';
                            }else{
                                $level_up_wallet->from = 'passive_commission';
                            }
                            $level_up_wallet->save();

                            $user_wallet = new UserWallet;
                            $user_wallet->user_id = $update_commission->user_id;
                            $user_wallet->from_id = $level_up_wallet->id;
                            $user_wallet->amount = $level_up_wallet->amount;
                            $user_wallet->type = 'debit';
                            $user_wallet->from = 'level_up_wallet_commission';
                            $user_wallet->save();

                            $user_detail = UserDetail::where('user_id',$update_commission->user_id)->first();
                            $user_detail->total_wallet_balance = $user_detail->total_wallet_balance - $level_up_wallet->amount;
                            $user_detail->save();
                        }
                    }
                }

                $user = User::where('id',$user_id)->with('userDetail.plan')->first();

                if($user->userDetail->plan->priority == $higher_plan->priority){
                    $total_user_level_up_wallet_credit_amount = LevelUpWallet::where('user_id',$user_id)->where('type','credit')->sum('amount');
                    $total_user_level_up_wallet_debit_amount = LevelUpWallet::where('user_id',$user_id)->where('type','debit')->sum('amount');
                    $total_user_level_up_wallet_remaining_amount = $total_user_level_up_wallet_credit_amount - $total_user_level_up_wallet_debit_amount;

                    if($total_user_level_up_wallet_remaining_amount > 0){
                        $level_up_wallet = new LevelUpWallet;
                        $level_up_wallet->user_id = $user->id;
                        $level_up_wallet->from_id = $user->id;
                        $level_up_wallet->amount = $total_user_level_up_wallet_remaining_amount;
                        $level_up_wallet->type = 'debit';
                        $level_up_wallet->from = 'main_wallet_transfer';
                        $level_up_wallet->save();


                        $user_wallet = new UserWallet;
                        $user_wallet->user_id = $user->id;
                        $user_wallet->from_id = $level_up_wallet->id;
                        $user_wallet->amount = $level_up_wallet->amount;
                        $user_wallet->type = 'credit';
                        $user_wallet->from = 'level_up_wallet_return';
                        $user_wallet->save();

                        $update_level_up_wallet = LevelUpWallet::find($level_up_wallet->id);
                        $update_level_up_wallet->from_id = $user_wallet->id;
                        $update_level_up_wallet->save();

                        $user_detail = UserDetail::where('user_id',$user->id)->first();
                        $user_detail->total_wallet_balance = $user_detail->total_wallet_balance + $level_up_wallet->amount;
                        $user_detail->save();
                    }
                }
            }
        }else{
            $user = User::where('id',$user_id)->with('userDetail.plan')->first();

            if($user->userDetail->plan->priority == $higher_plan->priority){
                $total_user_level_up_wallet_credit_amount = LevelUpWallet::where('user_id',$user_id)->where('type','credit')->sum('amount');
                $total_user_level_up_wallet_debit_amount = LevelUpWallet::where('user_id',$user_id)->where('type','debit')->sum('amount');
                $total_user_level_up_wallet_remaining_amount = $total_user_level_up_wallet_credit_amount - $total_user_level_up_wallet_debit_amount;

                if($total_user_level_up_wallet_remaining_amount > 0){
                    $level_up_wallet = new LevelUpWallet;
                    $level_up_wallet->user_id = $user->id;
                    $level_up_wallet->from_id = $user->id;
                    $level_up_wallet->amount = $total_user_level_up_wallet_remaining_amount;
                    $level_up_wallet->type = 'debit';
                    $level_up_wallet->from = 'main_wallet_transfer';
                    $level_up_wallet->save();


                    $user_wallet = new UserWallet;
                    $user_wallet->user_id = $user->id;
                    $user_wallet->from_id = $level_up_wallet->id;
                    $user_wallet->amount = $level_up_wallet->amount;
                    $user_wallet->type = 'credit';
                    $user_wallet->from = 'level_up_wallet_return';
                    $user_wallet->save();

                    $update_level_up_wallet = LevelUpWallet::find($level_up_wallet->id);
                    $update_level_up_wallet->from_id = $user_wallet->id;
                    $update_level_up_wallet->save();

                    $user_detail = UserDetail::where('user_id',$user->id)->first();
                    $user_detail->total_wallet_balance = $user_detail->total_wallet_balance + $level_up_wallet->amount;
                    $user_detail->save();
                }
            }
        }
    }

}
