<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{

    public function index(){
        $blogs = Blog::latest()->paginate(10);

        return view('admin.blog.index',compact('blogs'),['page_title'=>'Blog List']);
    }

    public function create(){
        return view('admin.blog.create',['page_title'=>'Add Blog']);
    }

    public function store(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'topic'=>'required',
            'image'=>'required|mimes:png,jpg,jpeg,webp',
            'writter_image'=>'nullable|mimes:png,jpg,jpeg,webp',
            'facebook_link'=>'nullable|url',
            'twitter_link'=>'nullable|url',
            'printrest_link'=>'nullable|url',
            'instagram_link'=>'nullable|url',
            'description'=>'required',
        ]);

        $blog = new Blog;
        $blog->slug = Str::slug($request->title).'-'.rand(111,999);
        $blog->title = $request->title;
        $blog->topic = $request->topic;
        $blog->image = imageUpload($request->file('image'),'backend/img/blog');
        $blog->tags = $request->tags;
        $blog->written_by = $request->written_by;
        $blog->writter_position = $request->writter_position;
        if($request->has('writter_image')){
            $blog->writter_image = imageUpload($request->file('writter_image'),'backend/img/blog');
        }
        $blog->facebook_link = $request->facebook_link;
        $blog->twitter_link = $request->twitter_link;
        $blog->printrest_link = $request->printrest_link;
        $blog->instagram_link = $request->instagram_link;
        $blog->short_description = $request->short_description;
        $blog->description = $request->description;
        $blog->save();

        return redirect()->route('admin.blog.index')->with('success','Blog Added Successfully!');
    }

    public function show(Request $request,$id){
        $status = decrypt($request->status);

        $blog = Blog::find(decrypt($id));
        $blog->is_publish = decrypt($request->status);
        $blog->save();

        if($status == '0'){
            return back()->with('error','Blog Unpublish Successfully!');
        }else{
            return back()->with('success','Blog Publish Successfully!');
        }

    }

    public function edit($id){
        $blog = Blog::find(decrypt($id));

        return view('admin.blog.edit',compact('blog'),['page_title'=>'Edit Blog']);
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'title'=>'required',
            'topic'=>'required',
            'image'=>'nullable|mimes:png,jpg,jpeg,webp',
            'writter_image'=>'nullable|mimes:png,jpg,jpeg,webp',
            'facebook_link'=>'nullable|url',
            'twitter_link'=>'nullable|url',
            'printrest_link'=>'nullable|url',
            'instagram_link'=>'nullable|url',
            'description'=>'required',
        ]);

        $blog = Blog::find(decrypt($id));
        $blog->title = $request->title;
        $blog->topic = $request->topic;
        if($request->has('image')){
            $blog->image = imageUpload($request->file('image'),'backend/img/blog');
        }
        $blog->tags = $request->tags;
        $blog->written_by = $request->written_by;
        $blog->writter_position = $request->writter_position;
        if($request->has('writter_image')){
            $blog->writter_image = imageUpload($request->file('writter_image'),'backend/img/blog');
        }
        $blog->facebook_link = $request->facebook_link;
        $blog->twitter_link = $request->twitter_link;
        $blog->printrest_link = $request->printrest_link;
        $blog->instagram_link = $request->instagram_link;
        $blog->short_description = $request->short_description;
        $blog->description = $request->description;
        $blog->save();

        return redirect()->route('admin.blog.index')->with('success','Blog Updated Successfully!');
    }

    public function destroy($id){
        Blog::where('id',decrypt($id))->delete();

        return back()->with('error','Blog Deleted Successfully!');
    }

}
