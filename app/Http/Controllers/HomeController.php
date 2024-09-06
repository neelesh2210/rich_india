<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Admin\Faq;
use App\Models\Admin\Plan;
use App\Models\Admin\Course;
use App\Models\Admin\Review;
use Illuminate\Http\Request;
use App\Models\InstagramLink;
use App\Models\Admin\Instructor;
use App\Models\Admin\WebsiteSetting;

class HomeController extends Controller
{
    public function index(Request $request){
        if($request->referrer_code){
            Session::put('referrer_code', $request->referrer_code);
        }

        $desktop_sliders = WebsiteSetting::select('content','url')->where('type','slider_desktop')->latest()->get();
        $mobile_sliders = WebsiteSetting::select('content','url')->where('type','slider_mobile')->latest()->get();

        $plans = Plan::where('delete_status','0')->where('status','1')->oldest('priority')->get();
        $courses = Course::where('delete_status','0')->where('status','1')->withCount('topic')->get();
        $instructors = Instructor::latest()->get();
        $reviews = Review::latest()->get();
        $faqs = Faq::latest()->get();
        $instagram_links = InstagramLink::latest()->get();

        $website_data = WebsiteSetting::where(function($query){
            $query->where('type', 'trainers')
                ->orWhere('type', 'students')
                ->orWhere('type', 'live_training')
                ->orWhere('type', 'community_earning')
                ->orWhere('type', 'whatsapp')
                ->orWhere('type', 'address')
                ->orWhere('type', 'email');
        })->pluck('content','type');

        $website_social_link = WebsiteSetting::where('type','social')->where(function($query){
            $query->where('content', 'facebook')
                ->orWhere('content', 'youtube')
                ->orWhere('content', 'instagram')
                ->orWhere('content', 'linkedin');
        })->pluck('url','content');

        return view('frontend.index',compact('desktop_sliders','mobile_sliders','website_data','courses','plans','reviews','instructors','faqs','website_social_link','instagram_links'));
    }

    public function about(){
        $reviews = Review::latest()->get();
        return view('frontend.about',compact('reviews'));
    }
}
