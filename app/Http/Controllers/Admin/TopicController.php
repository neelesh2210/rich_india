<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\CPU\TopicManager;
use App\Models\Admin\Topic;
use Illuminate\Http\Request;
use Vimeo\Laravel\Facades\Vimeo;
use App\Http\Controllers\Controller;

class TopicController extends Controller
{

    public function index(Request $request)
    {
        $search_key = $request->search_key;
        $search_course_id = $request->search_course_id;
        $topics = TopicManager::withoutTrash();

        if($search_course_id)
        {
            $topics = $topics->where('course_id',$search_course_id);
        }
        if($search_key)
        {
            $topics = $topics->where('title','like','%'.$search_key.'%');
        }
        $topics = $topics->orderBy('created_at','desc')->paginate(10);

        return view('admin.topic.index',compact('topics','search_key','search_course_id'),['page_title'=>'Topics']);
    }

    public function create(Request $request)
    {
        return view('admin.topic.create',['search_key'=>$request->search_key,'search_course_id'=>$request->search_course_id,'page_title'=>'Add Topic']);
    }

    public function store(Request $request)
    {
        $topic = new Topic;

        $topic->course_id = $request->course_id;
        $topic->title = $request->title;
        $topic->thumbnail_image = imageUpload($request->file('thumbnail_image'),'backend/img/topic');
        $topic->cover_image = imageUpload($request->file('cover_image'),'backend/img/topic');

        if($request->video_url)
        {
            if($request->is_url == 'video')
            {
                $video_file = $request->video_url;
                $video= Vimeo::upload($video_file,['name'=>$request->title]);

                $topic->video_url = 'https://player.vimeo.com/video/'.substr($video,8);
                $topic->is_url = '0';
            }
            if($request->is_url == 'url')
            {
                $topic->video_url = $request->video_url;
                $topic->is_url = '1';
            }
        }
        $topic->pdf = imageUpload($request->file('pdf'),'backend/img/topic');
        $topic->description = $request->description;
        if($request->seo_title)
        {
            $topic->seo_title = $request->seo_title;
        }
        else
        {
            $topic->seo_title = $request->title;
        }
        if($request->seo_keyword)
        {
            $topic->seo_keyword = $request->seo_keyword;
        }
        else
        {
            $topic->seo_keyword = $request->title;
        }
        if($request->seo_description)
        {
            $topic->seo_description = $request->seo_description;
        }
        else
        {
            $topic->seo_description = $request->title;
        }

        $topic->save();

        return redirect()->route('admin.topic.index',['search_key'=>$request->search_key,'search_course_id'=>$request->search_course_id]);
    }

    public function edit(Request $request,$id)
    {
        try{
            $topic = Topic::where('id',decrypt($id))->first();

            return view('admin.topic.edit',compact('topic'),['search_key'=>$request->search_key,'search_course_id'=>$request->search_course_id,'page_title'=>'Edit Topic']);
        }catch(Exception $exception)
        {
            abort(404);
        }
    }

    public function update(Request $request,$id)
    {
        try{
            $topic = Topic::find(decrypt($id));

            $topic->course_id = $request->course_id;
            $topic->title = $request->title;
            if($request->has('thumbnail_image'))
            {
                $topic->thumbnail_image = imageUpload($request->file('thumbnail_image'),'backend/img/topic');
            }
            if($request->has('cover_image'))
            {
                $topic->cover_image = imageUpload($request->file('cover_image'),'backend/img/topic');
            }
            if($request->video_url)
            {
                if($request->is_url == 'video')
                {
                    $video_file = $request->video_url;
                    $video= Vimeo::upload($video_file,['name'=>$request->title]);

                    $topic->video_url = 'https://player.vimeo.com/video/'.substr($video,8);
                    $topic->is_url = '0';
                }
                if($request->is_url == 'url')
                {
                    $topic->video_url = $request->video_url;
                    $topic->is_url = '1';
                }
            }
            if($request->has('pdf'))
            {
                $topic->pdf = imageUpload($request->file('pdf'),'backend/img/topic');
            }
            $topic->description = $request->description;
            if($request->seo_title)
            {
                $topic->seo_title = $request->seo_title;
            }
            else
            {
                $topic->seo_title = $request->title;
            }
            if($request->seo_keyword)
            {
                $topic->seo_keyword = $request->seo_keyword;
            }
            else
            {
                $topic->seo_keyword = $request->title;
            }
            if($request->seo_description)
            {
                $topic->seo_description = $request->seo_description;
            }
            else
            {
                $topic->seo_description = $request->title;
            }

            $topic->save();

            return redirect()->route('admin.topic.index',['search_key'=>$request->search_key,'search_course_id'=>$request->search_course_id]);
        }catch(Exception $exception)
        {
            abort(500);
        }
    }

    public function destroy($id)
    {
        Topic::where('id',decrypt($id))->update([
            'delete_status'=>'1'
        ]);

        return back()->with('error','Topic Deleted Successfully!');
    }

    public function status($id,$status)
    {
        Topic::where('id',decrypt($id))->update([
            'status'=>decrypt($status)
        ]);

        return back()->with('success','Topic Status Changed Successfully!');
    }

}
