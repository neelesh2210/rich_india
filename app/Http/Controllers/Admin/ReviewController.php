<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{

    public function index(){
        $reviews = Review::orderBy('id','desc')->paginate(10);

        return view('admin.review.index',compact('reviews'),['page_title'=>'Review List']);
    }

    public function create(){
        return view('admin.review.create',['page_title'=>'Add Review']);
    }

    public function store(Request $request){
        $review = new Review;
        $review->name = $request->name;
        $review->designation = $request->designation;
        $review->message = $request->message;
        $review->image = imageUpload($request->file('image'),'backend/img/reviews');;
        $review->save();

        return redirect()->route('admin.reviews.index')->with('success','Review Added Successfully!');
    }

    public function show($id){
        //
    }

    public function edit($id){
        $review = Review::find(decrypt($id));

        return view('admin.review.edit',compact('review'),['page_title'=>'Edit Review']);
    }

    public function update(Request $request, $id){
        $review = Review::find(decrypt($id));
        $review->name = $request->name;
        $review->designation = $request->designation;
        $review->message = $request->message;
        if($request->has('image')){
            $review->image = imageUpload($request->file('image'),'backend/img/reviews');;
        }
        $review->save();

        return redirect()->route('admin.reviews.index')->with('success','Review Updated Successfully!');
    }

    public function destroy($id){
        Review::destroy(decrypt($id));

        return back()->with('error','Review Deleted Successfully!');
    }
}
