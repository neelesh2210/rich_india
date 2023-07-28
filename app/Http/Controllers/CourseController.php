<?php

namespace App\Http\Controllers;

use App\CPU\TopicManager;
use App\CPU\CourseManager;
use App\Models\Admin\Course;
use App\Models\PlanPurchase;
use Illuminate\Http\Request;
use App\Models\Admin\UserDetail;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{

    public function index()
    {
        $user_detail = UserDetail::where('user_id',Auth::guard('web')->user()->id)->first();
        $plan_purchase = PlanPurchase::where('delete_status','0')->where('user_id',Auth::guard('web')->user()->id)->where('plan_id',$user_detail->current_plan_id)->first();
        $enrolled_courses = CourseManager::withoutTrash()->whereIn('id',$plan_purchase->course_ids)->get();
        $active_courses = CourseManager::withoutTrash()->where('status',1)->whereIn('id',$plan_purchase->course_ids)->get();

        return view('user_dashboard.courses.course',compact('enrolled_courses','active_courses'));
    }

    public function detail($course_id)
    {
        $course_detail = CourseManager::withoutTrash()->where('id',decrypt($course_id))->first();
        $topics = TopicManager::withoutTrash()->where('course_id',decrypt($course_id))->simplepaginate(1);
        $topic_list = TopicManager::withoutTrash()->where('course_id',decrypt($course_id))->get();

        return view('user_dashboard.courses.course_details',compact('course_detail','topics','topic_list'));
    }

    public function courseDetail($slug){
        $course = Course::where('slug',$slug)->first();
        return view('frontend.course_detail',compact('course'));
    }

}
