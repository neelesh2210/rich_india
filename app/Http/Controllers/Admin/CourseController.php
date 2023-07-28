<?php

namespace App\Http\Controllers\Admin;

use App\CPU\CourseManager;
use App\Models\Admin\Topic;
use App\Models\Admin\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{

    public function index(Request $request)
    {
        $search_key = $request->search_key;
        $courses = CourseManager::withoutTrash();
        if($search_key)
        {
            $courses = $courses->where('name','like','%'.$search_key.'%');
        }
        $courses = $courses->orderBy('name','asc')->paginate(10);
        return view('admin.course.index',compact('courses','search_key'),['page_title'=>'Courses']);
    }

    public function create(Request $request)
    {
        return view('admin.course.create',['search_key'=>$request->search_key,'page_title'=>'Add Course']);
    }

    public function store(Request $request)
    {
        $course = new Course;

        $course->slug = strtolower(str_replace(" ","-",$request->name)).'-'.generateRandomString(4);
        $course->name = $request->name;
        $course->image = imageUpload($request->file('image'),'backend/img/course');
        $course->price = $request->price;
        $course->discount = $request->discount;
        $course->discounted_price = $request->discounted_price;
        $course->referral_commission = $request->referral_commission;
        $course->referral_commission_type = $request->referral_commission_type;
        $course->description = $request->description;
        if($request->seo_title)
        {
            $course->seo_title = $request->seo_title;
        }
        else
        {
            $course->seo_title = $request->name;
        }
        if($request->seo_keyword)
        {
            $course->seo_keyword = $request->seo_keyword;
        }
        else
        {
            $course->seo_keyword = $request->name;
        }
        if($request->seo_description)
        {
            $course->seo_description = $request->seo_description;
        }
        else
        {
            $course->seo_description = $request->name;
        }

        $course->save();

        return redirect()->route('admin.course.index',['search_key'=>$request->search_key]);
    }

    public function edit(Request $request,$course)
    {
        $course = Course::find(decrypt($course));

        return view('admin.course.edit',compact('course'),['search_key'=>$request->search_key,'page_title'=>'Edit Course']);
    }

    public function update(Request $request,$id)
    {
        $course = Course::find(decrypt($id));

        $course->name = $request->name;
        if($request->has('image'))
        {
            $course->image = imageUpload($request->file('image'),'backend/img/course');
        }

        $course->price = $request->price;
        $course->discount = $request->discount;
        $course->discounted_price = $request->discounted_price;
        $course->referral_commission = $request->referral_commission;
        $course->referral_commission_type = $request->referral_commission_type;
        $course->description = $request->description;
        if($request->seo_title)
        {
            $course->seo_title = $request->seo_title;
        }
        else
        {
            $course->seo_title = $request->name;
        }
        if($request->seo_keyword)
        {
            $course->seo_keyword = $request->seo_keyword;
        }
        else
        {
            $course->seo_keyword = $request->name;
        }
        if($request->seo_description)
        {
            $course->seo_description = $request->seo_description;
        }
        else
        {
            $course->seo_description = $request->name;
        }

        $course->save();

        return redirect()->route('admin.course.index',['search_key'=>$request->search_key]);
    }

    public function destroy($id)
    {
        Course::where('id',decrypt($id))->update([
            'delete_status'=>'1'
        ]);

        Topic::where('id',decrypt($id))->update([
            'delete_status'=>'1'
        ]);

        return back()->with('error','Course Deleted Successfully!');
    }

    public function status($id,$status)
    {
        Course::where('id',decrypt($id))->update([
            'status'=>decrypt($status)
        ]);

        return back()->with('success','Course Deleted Successfully!');
    }

}
