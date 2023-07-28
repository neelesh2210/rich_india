<?php

namespace App\Http\Controllers;

use Session;
use App\CPU\PlanManager;
use App\Models\Admin\Faq;
use App\Models\Admin\Media;
use App\Models\Admin\Review;
use Illuminate\Http\Request;
use App\Models\Admin\Instructor;
use App\Models\Admin\WebsiteSetting;
use App\Models\Admin\TestimonialVideo;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if($request->referrer_code){
            Session::put('referrer_code', $request->referrer_code);
        }
        $desktop_sliders = WebsiteSetting::select('content','url')->where('type','slider_desktop')->get();
        $mobile_sliders = WebsiteSetting::select('content','url')->where('type','slider_mobile')->get();
        $plans = PlanManager::withoutTrash()->select('id','course_ids','slug','title','amount','discounted_price','points','image')->where('status',1)->orderBy('priority','desc')->get();
        $testimonialvideos = TestimonialVideo::select('video_url','thumbnail_image')->where('status',1)->get();
        $faqs = Faq::select('title','content')->get();
        $instructors = Instructor::orderBy('id','desc')->get();
        $reviews = Review::orderBy('id','desc')->get();
        $medias = Media::orderBy('id','desc')->get();
        $meetups = WebsiteSetting::select('content')->where('type','meetup')->get();

        return view('frontend.index',compact('desktop_sliders','mobile_sliders','plans','testimonialvideos','faqs','instructors','reviews','medias','meetups'));
    }
}
