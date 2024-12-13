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
use App\Models\WithdrawalRequest;
use App\Models\UpgradePlanRequest;
use App\Models\Admin\WebsiteSetting;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AutoUpgradeController;

class UpgradePlanRequestController extends Controller
{

    public function index(){
        $list = UpgradePlanRequest::where('request_user_id',Auth::guard('web')->user()->id)->where('status','!=','success')->with(['user.userDetail','plan'])->orderBy('id','desc')->paginate(10);

        return view('user_dashboard.upgrade_plan_request.index',compact('list'));
    }

    public function store(Request $request){
        if(!UpgradePlanRequest::where('user_id',Auth::guard('web')->user()->id)->where('status','pending')->first()){
            $plan = Plan::where('id',$request->plan_id)->first();
            $referrel_user = User::where('referrer_code',Auth::guard('web')->user()->referral_code)->first();
            if($referrel_user){
                if(Auth::guard('web')->user()->userDetail->current_plan_id < $plan->priority){
                    $upgrade_plan_request = new UpgradePlanRequest;
                    $upgrade_plan_request->user_id = Auth::guard('web')->user()->id;
                    $upgrade_plan_request->request_user_id = $referrel_user->id;
                    $upgrade_plan_request->plan_id = $request->plan_id;
                    $upgrade_plan_request->save();
                }else{
                    return response()->json(['message'=>'Request Plan is lower then current plan'],401);
                }
            }else{
                return response()->json(['message'=>'You Have no Referrar!'],401);
            }
        }else{
            return response()->json(['message'=>'You Have Previous Request Pending!'],401);
        }
    }

    public function show($id){
        $data = UpgradePlanRequest::where('request_user_id',Auth::guard('web')->user()->id)->where('id',decrypt($id))->with(['user.userDetail','plan'])->first();

        return view('user_dashboard.upgrade_plan_request.show',compact('data'));
    }

    public function update(Request $request,$id){
        $withdrawal_request = WithdrawalRequest::where('user_id',Auth::guard('web')->user()->id)->latest()->first();
        if(optional($withdrawal_request)->status == 'pending'){
            return back()->with('error','You Have Pending Withdrawal Request!');
        }else{
            $data = UpgradePlanRequest::with(['user','plan'])->findOrFail(decrypt($id));
            if($data){
                if($data->status == 'pending'){
                    $user = User::where('id',$data->user_id)->first();
                    $user_detail = UserDetail::where('user_id',$data->user_id)->first();
                    $current_plan = Plan::where('id',$user_detail->current_plan_id)->first();
                    $upgrade_plan_detail = Plan::where('id',$data->plan_id)->first();
                    $total_amount = $current_plan->upgrade_amount[$upgrade_plan_detail->priority - $current_plan->priority - 1];
                    if($total_amount <= Auth::guard('web')->user()->userDetail->total_wallet_balance){
                        $plan_purchase = new PlanPurchase;
                        $plan_purchase->user_id = $data->user_id;
                        $plan_purchase->plan_id = $data->plan_id;
                        $plan_purchase->amount = $total_amount;
                        $plan_purchase->total_amount = $total_amount;
                        $plan_purchase->payment_detail = json_encode(["id"=>"From Wallet","amount"=>$total_amount]);
                        $plan_purchase->payment_status = 'success';
                        $plan_purchase->save();

                        $user_wallet = new UserWallet;
                        $user_wallet->user_id = Auth::guard('web')->user()->id;
                        $user_wallet->from_id = $plan_purchase->id;
                        $user_wallet->amount = $total_amount;
                        $user_wallet->type = 'debit';
                        $user_wallet->from = 'upgrade';
                        $user_wallet->save();

                        $user_detail->current_plan_id = $data->plan_id;
                        $user_detail->save();

                        $upgrade_user_detail = UserDetail::where('user_id',Auth::guard('web')->user()->id)->first();
                        $upgrade_user_detail->total_wallet_balance = $upgrade_user_detail->total_wallet_balance - $total_amount;
                        $upgrade_user_detail->save();

                        $upgrade_commission_level = WebsiteSetting::where('type','upgrade_commission_level')->first();

                        $referrer_code = Auth::guard('web')->user()->referrer_code;

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
                                if($i==1){
                                    $user_wallet->from = 'active_commission';
                                }else{
                                    $user_wallet->from = 'passive_commission';
                                }
                                $user_wallet->save();

                                $update_commission->total_commission = $update_commission->total_commission + $current_plan->upgrade_commission[$upgrade_plan_detail->priority - $current_plan->priority - 1][$i-1];
                                $update_commission->total_wallet_balance = $update_commission->total_wallet_balance + $current_plan->upgrade_commission[$upgrade_plan_detail->priority - $current_plan->priority - 1][$i-1];
                                $update_commission->save();

                                $higher_plan = Plan::where('delete_status','0')->where('status','1')->latest('priority')->first();
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

                                    $auto_upgrade_controller = new AutoUpgradeController;
                                    $auto_upgrade_controller->upgradePlan($update_commission->user_id);
                                }
                            }

                        }

                        $data->status = 'success';
                        $data->save();

                        $higher_plan = Plan::where('delete_status','0')->where('status','1')->latest('priority')->first();
                        if($user->userDetail->plan->priority == $higher_plan->priority){
                            $total_user_level_up_wallet_credit_amount = LevelUpWallet::where('user_id',$user->id)->where('type','credit')->sum('amount');
                            $total_user_level_up_wallet_debit_amount = LevelUpWallet::where('user_id',$user->id)->where('type','debit')->sum('amount');
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

                        return redirect()->route('user.upgrade.plan.request.list')->with('success','Plan Upgrade Successfully!');
                    }else{
                        return back()->with('error','Insufficient Balance!');
                    }
                }else{
                    return back()->with('error','This Request Already Proccessed!');
                }
            }else{
                $user_detail = UserDetail::where('user_id',$data->user_id)->first();
                    $current_plan = Plan::where('id',$user_detail->current_plan_id)->first();
                    $upgrade_plan_detail = Plan::where('id',$data->plan_id)->first();
                    $total_amount = $current_plan->upgrade_amount[$upgrade_plan_detail->priority - $current_plan->priority - 1];
                    if($total_amount <= Auth::guard('web')->user()->userDetail->total_wallet_balance){
                        $plan_purchase = new PlanPurchase;
                        $plan_purchase->user_id = $data->user_id;
                        $plan_purchase->plan_id = $data->plan_id;
                        $plan_purchase->amount = $total_amount;
                        $plan_purchase->total_amount = $total_amount;
                        $plan_purchase->payment_detail = json_encode(["id"=>"From Wallet","amount"=>$total_amount]);
                        $plan_purchase->payment_status = 'success';
                        $plan_purchase->save();

                        $user_wallet = new UserWallet;
                        $user_wallet->user_id = Auth::guard('web')->user()->id;
                        $user_wallet->from_id = $plan_purchase->id;
                        $user_wallet->amount = $total_amount;
                        $user_wallet->type = 'debit';
                        $user_wallet->from = 'upgrade';
                        $user_wallet->save();

                        $user_detail->current_plan_id = $data->plan_id;
                        $user_detail->save();

                        $upgrade_user_detail = UserDetail::where('user_id',Auth::guard('web')->user()->id)->first();
                        $upgrade_user_detail->total_wallet_balance = $upgrade_user_detail->total_wallet_balance - $total_amount;
                        $upgrade_user_detail->save();

                        $upgrade_commission_level = WebsiteSetting::where('type','upgrade_commission_level')->first();

                        $referrer_code = Auth::guard('web')->user()->referrer_code;

                        for($i=1;$i<=$upgrade_commission_level->content;$i++){
                            $commission_user = User::where('referrer_code',$referrer_code)->first();
                            if($commission_user){
                                $update_commission = UserDetail::where('user_id',$commission_user->id)->first();
                                $referrer_code = optional(User::where('id',$update_commission->user_id)->first())->referral_code;
                            }else{
                                $update_commission = UserDetail::first();
                                $referrer_code = User::where('id',$update_commission->user_id)->first()->referrer_code;
                            }

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
                            if($i==1){
                                $user_wallet->from = 'active_commission';
                            }else{
                                $user_wallet->from = 'passive_commission';
                            }
                            $user_wallet->save();

                            $update_commission->total_commission = $update_commission->total_commission + $current_plan->upgrade_commission[$upgrade_plan_detail->priority - $current_plan->priority - 1][$i-1];
                            $update_commission->total_wallet_balance = $update_commission->total_wallet_balance + $current_plan->upgrade_commission[$upgrade_plan_detail->priority - $current_plan->priority - 1][$i-1];
                            $update_commission->save();

                        }

                        $data->status = 'success';
                        $data->save();

                        return redirect()->route('user.upgrade.plan.request.list')->with('success','Plan Upgrade Successfully!');
                    }else{
                        return back()->with('error','Insufficient Balance!');
                    }
            }
        }

    }

}
