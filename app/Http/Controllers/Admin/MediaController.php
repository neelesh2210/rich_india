<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Media;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MediaController extends Controller
{

    public function index(){
        $medias = Media::orderBy('id','desc')->get();

        return view('admin.media.index',compact('medias'),['page_title'=>'Medias']);
    }

    public function create(){
        //
    }

    public function store(Request $request){
        $media = new Media;
        $media->image = imageUpload($request->file('image'),'backend/img/websitesetting/medias');

        $media->save();

        return back()->with('success','Media Added Successfully!');
    }

    public function show($id){
        //
    }

    public function edit($id){
        //
    }

    public function update(Request $request, $id){
        //
    }

    public function destroy($id){
        Media::destroy(decrypt($id));

        return back()->with('error','Media Deleted Successfully!');
    }
}
