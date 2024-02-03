<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Admin\Faq;
use App\Models\Admin\Plan;
use App\Models\Admin\Course;
use App\Models\Admin\Review;
use Illuminate\Http\Request;
use App\Models\Admin\Instructor;
use App\Models\Admin\WebsiteSetting;

class HomeController extends Controller
{
    public function index(Request $request){
        if($request->referrer_code){
            Session::put('referrer_code', $request->referrer_code);
        }
        $website_data = WebsiteSetting::where(function($query){
            $query->where('type', 'trainers')
                ->orWhere('type', 'students')
                ->orWhere('type', 'live_training')
                ->orWhere('type', 'community_earning')
                ->orWhere('type', 'whatsapp');
        })->oldest('id')->get();
        $courses = Course::where('delete_status','0')->where('status','1')->withCount('topic')->get();
        $plans = Plan::where('delete_status','0')->where('status','1')->oldest('priority')->get();
        $reviews = Review::latest()->get();
        $instructors = Instructor::latest()->get();
        $faqs = Faq::latest()->get();

        return view('frontend.index',compact('website_data','courses','plans','reviews','instructors','faqs'));
    }

    public function about(){
        $reviews = Review::latest()->get();
        return view('frontend.about',compact('reviews'));
    }
}
