<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\TestimonialVideo;

class TestimonialVideoController extends Controller
{

    public function index()
    {
        $testimonialvideos = TestimonialVideo::all();

        return view('admin.testimonial.index',compact('testimonialvideos'),['page_title'=>'Testimonial Videos']);
    }

    public function store(Request $request)
    {
        $testimonialvideo = new TestimonialVideo;

        $testimonialvideo->video_url = $request->video_url;
        $testimonialvideo->thumbnail_image = imageUpload($request->file('thumbnail_image'),'backend/img/testimonial');

        $testimonialvideo->save();

        return back()->with('success','Testimonial Added Successfully!');
    }

    public function destroy($id)
    {
        TestimonialVideo::destroy(decrypt($id));
        return back()->with('error','Testimonial Deleted Successfully!');
    }

}
