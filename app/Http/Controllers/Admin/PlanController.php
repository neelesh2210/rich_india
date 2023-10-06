<?php

namespace App\Http\Controllers\Admin;

use App\CPU\PlanManager;
use App\CPU\CourseManager;
use App\Models\Admin\Plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\WebsiteSetting;
use App\Models\Admin\CommissionSetting;

class PlanController extends Controller
{

    public function index()
    {
        $courses = CourseManager::withoutTrash()->get();
        $commision_setting = CommissionSetting::get();
        $upgrade_commission_setting = WebsiteSetting::where('type','upgrade_commission_level')->first();
        if($courses->count() == 0)
        {
            return redirect()->route('admin.course.index')->with('error','Add Some Courses First');
        }
        if($commision_setting->count() == 0 || !$upgrade_commission_setting)
        {
            return redirect()->route('admin.commission-setting.index')->with('error','Add Commission Level First');
        }
        $plans = PlanManager::withoutTrash()->orderBy('priority','asc')->get();

        return view('admin.plan.index',compact('plans'),['page_title'=>'Plans']);
    }

    public function create()
    {
        return view('admin.plan.create',['page_title'=>'Add Plan']);
    }

    public function store(Request $request)
    {
        $priority = Plan::orderBy('id','desc')->first();

        if($priority){
            $priority = $priority->priority + 1;
        }else{
            $priority = 1;
        }

        $plan = new Plan;

        $plan->priority = $priority;
        $plan->slug = strtolower(str_replace(' ','-',$request->slug));
        $plan->title = $request->title;
        $plan->amount = $request->amount;
        $plan->discounted_price = $request->discounted_price;
        $plan->image = imageUpload($request->file('image'),'backend/img/plan');
        $plan->commission = $request->commission;
        $plan->cosmofeed_base_price_url = $request->cosmofeed_base_price_url;
        $plan->cosmofeed_discounted_price_url = $request->cosmofeed_discounted_price_url;
        $plan->points = $request->points;
        $plan->course_ids = $request->course_ids;
        $plan->description = $request->description;
        if($request->seo_title)
        {
            $plan->seo_title = $request->seo_title;
        }
        else
        {
            $plan->seo_title = $request->title;
        }
        if($request->seo_keyword)
        {
            $plan->seo_keyword = $request->seo_keyword;
        }
        else
        {
            $plan->seo_keyword = $request->title;
        }
        if($request->seo_description)
        {
            $plan->seo_description = $request->seo_description;
        }
        else
        {
            $plan->seo_description = $request->title;
        }

        $plan->save();

        return redirect()->route('admin.plan.index')->with('success','Plan Added Successfully!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $plan = Plan::find(decrypt($id));

        return view('admin.plan.edit',compact('plan'),['page_title'=>'Edit Plan']);
    }

    public function update(Request $request, $id)
    {
        $upgrade_commission_amount = [];
        if($request->upgrade_amount){
            foreach($request->upgrade_amount as $key=>$amount){
                $num = $key+1;
                $single_amount = 'upgrade_commission_'.$num;
                array_push($upgrade_commission_amount,$request->$single_amount);
            }
        }
        $plan = Plan::find(decrypt($id));

        $plan->slug = strtolower(str_replace(' ','-',$request->slug));
        $plan->title = $request->title;
        $plan->amount = $request->amount;
        $plan->discounted_price = $request->discounted_price;
        if($request->has('image'))
        {
           $plan->image = imageUpload($request->file('image'),'backend/img/plan');
        }
        $plan->commission = $request->commission;
        $plan->cosmofeed_base_price_url = $request->cosmofeed_base_price_url;
        $plan->cosmofeed_discounted_price_url = $request->cosmofeed_discounted_price_url;
        $plan->points = $request->points;
        $plan->course_ids = $request->course_ids;
        $plan->description = $request->description;
        $plan->upgrade_amount = $request->upgrade_amount;
        $plan->upgrade_commission = $upgrade_commission_amount;
        if($request->seo_title)
        {
            $plan->seo_title = $request->seo_title;
        }
        else
        {
            $plan->seo_title = $request->title;
        }
        if($request->seo_keyword)
        {
            $plan->seo_keyword = $request->seo_keyword;
        }
        else
        {
            $plan->seo_keyword = $request->title;
        }
        if($request->seo_description)
        {
            $plan->seo_description = $request->seo_description;
        }
        else
        {
            $plan->seo_description = $request->title;
        }

        $plan->save();

        return redirect()->route('admin.plan.index')->with('success','Plan Updated Successfully!');
    }

    public function destroy($id)
    {
        $plan = Plan::find(decrypt($id));

        $plan->delete_status = 1;

        $plan->save();

        return back()->with('error','Plan Deleted Successfully!');
    }

    public function status($id,$status)
    {
        $plan = Plan::find(decrypt($id));

        $plan->status = decrypt($status);

        $plan->save();

        return back()->with('success','Plan Status Updated Successfully!');
    }
}
