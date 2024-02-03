<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index(){
        $blogs = Blog::where('is_publish','1')->latest()->get();

        return view('frontend.blog',compact('blogs'));
    }

    public function show($slug){
        $blog = Blog::where('slug',$slug)->first();

        return view('frontend.blog_details',compact('blog'));
    }

}
