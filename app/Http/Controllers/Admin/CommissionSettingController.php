<?php

namespace App\Http\Controllers\Admin;

use App\CPU\PlanManager;
use App\Models\Admin\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\WebsiteSetting;
use App\Models\Admin\CommissionSetting;

class CommissionSettingController extends Controller
{

    public function index()
    {
        $commission_settings = CommissionSetting::all();
        $update_commission_setting = WebsiteSetting::where('type','upgrade_commission_level')->first();
        $service_charge = WebsiteSetting::where('type','service_charge')->first();
        $tds_charge = WebsiteSetting::where('type','tds_charge')->first();

        return view('admin.commission_setting.index',compact('commission_settings','update_commission_setting','service_charge','tds_charge'),['page_title'=>'Commission Setting']);
    }

    public function store(Request $request)
    {
        CommissionSetting::truncate();
        if($request->for_plan){
            PlanManager::withoutTrash()->update(['commission'=>[]]);
        }
        foreach($request->percent as $key=>$percent){
            $commission_setting = new CommissionSetting;
            $commission_setting->level = $key+1;
            if(!$percent){
                $percent = 0;
            }
            $commission_setting->pecent = $percent;
            $commission_setting->save();
            if($request->for_plan){
            $plans = PlanManager::withoutTrash()->get();
                foreach($plans as $plan){
                    $commission = $plan->amount*$percent/100;
                    $asd = $plan->commission;
                    array_push($asd,$commission);
                    $plan->commission = Plan::where('id',$plan->id)->update(['commission'=>$asd]);
                }
            }
        }

        return back()->with('success','Data Updated Succesfully!');
    }

    public function updateCommissionLevel(Request $request){
        WebsiteSetting::updateOrCreate([
            'type'=>'upgrade_commission_level'
        ],[
            'content'=>$request->upgrade_commission_level
        ]);

        return back()->with('success','Commission Level Updated!');
    }

    public function updateWithdrawalDeductionCharges(Request $request){
        WebsiteSetting::updateOrCreate([
            'type'=>'service_charge'
        ],[
            'content'=>$request->service_charge??0
        ]);
        WebsiteSetting::updateOrCreate([
            'type'=>'tds_charge'
        ],[
            'content'=>$request->tds_charge??0
        ]);

        return back()->with('success','Withdrawal Deduction Charges Updated!');
    }
}
