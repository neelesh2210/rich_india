<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Webinar;
use App\Http\Controllers\Controller;

class WebinarController extends Controller
{

    public function index(){
        $webinars = Webinar::orderBy('id','desc')->paginate(15);

        return view('admin.webinar.index',compact('webinars'),['page_title'=>'Webinars']);
    }

    public function create(){
        return view('admin.webinar.create',['page_title'=>'Add Webinar']);
    }

    public function store(Request $request){
        $webinar = new Webinar;
        $webinar->title = $request->title;
        $webinar->image = imageUpload($request->file('image'),'backend/img/webinar');
        $webinar->date_time = $request->date_time;
        $webinar->description = $request->description;
        $webinar->link = $request->link;
        $webinar->save();

        return redirect()->route('admin.webinars.index')->with('success','Webinar Added Successfully!');
    }

    public function edit(Webinar $webinar){
        return view('admin.webinar.edit',compact('webinar'),['page_title'=>'Edit Webinars']);
    }

    public function update(Request $request,Webinar $webinar){
        $webinar->title = $request->title;
        if($request->has('image')){
            $webinar->image = imageUpload($request->file('image'),'backend/img/webinar');
        }
        $webinar->date_time = $request->date_time;
        $webinar->description = $request->description;
        $webinar->link = $request->link;
        $webinar->save();

        return redirect()->route('admin.webinars.index')->with('success','Webinar Updated Successfully!');
    }

    public function destroy(Webinar $webinar){

        $webinar->delete();

        return redirect()->route('admin.webinars.index')->with('error','Webinar Deleted Successfully!');
    }

}
