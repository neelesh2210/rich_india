<?php

namespace App\Http\Controllers;

use App\CPU\TopicManager;
use App\CPU\CourseManager;
use App\Models\Admin\Plan;
use App\Models\Admin\Topic;
use App\Models\Admin\Course;
use App\Models\PlanPurchase;
use Illuminate\Http\Request;
use App\Models\Admin\UserDetail;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{

    public function index(){
        $user_detail = UserDetail::where('user_id',Auth::guard('web')->user()->id)->first();
        $plan = Plan::where('delete_status','0')->where('status','1')->where('id',$user_detail->current_plan_id)->first();
        $enrolled_courses = CourseManager::withoutTrash()->whereIn('id',$plan->course_ids)->get();
        $active_courses = CourseManager::withoutTrash()->where('status',1)->whereIn('id',$plan->course_ids)->get();

        return view('user_dashboard.courses.course',compact('enrolled_courses','active_courses'));
    }

    public function selectLanguage($course_id){
        $course_detail = CourseManager::withoutTrash()->where('id',decrypt($course_id))->first();
        $languages = Topic::where('delete_status','0')->where('status','1')->where('course_id',$course_detail->id)->groupBy('language_id')->pluck('language_id');

        return view('user_dashboard.courses.select_langauge',compact('course_detail','languages'));
    }

    public function detail($course_id,$language_id)
    {
        $course_detail = CourseManager::withoutTrash()->where('id',decrypt($course_id))->first();
        $topics = TopicManager::withoutTrash()->where('course_id',decrypt($course_id))->where('language_id',decrypt($language_id))->simplepaginate(1);
        $topic_list = TopicManager::withoutTrash()->where('course_id',decrypt($course_id))->where('language_id',decrypt($language_id))->get();

        return view('user_dashboard.courses.course_details',compact('course_detail','topics','topic_list'));
    }

    public function courseDetail($slug){
        $course = Course::where('slug',$slug)->with('topic')->withCount('topic')->first();

        if(!$course){
            return redirect()->redirect('index')->with('error','Course not found');
        }
        return view('frontend.course_details',compact('course'));
    }

}
