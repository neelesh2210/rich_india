<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Training;
use App\Http\Controllers\Controller;

class TrainingController extends Controller
{

    public function index(){
        $trainings = Training::orderBy('id','desc')->paginate(15);

        return view('admin.training.index',compact('trainings'),['page_title'=>'Training']);
    }

    public function create(){
        return view('admin.training.create',['page_title'=>'Add Training']);
    }

    public function store(Request $request){
        $training = new Training;
        $training->title = $request->title;
        $training->image = imageUpload($request->file('image'),'backend/img/training');
        $training->date_time = $request->date_time;
        $training->description = $request->description;
        $training->link = $request->link;
        $training->save();

        return redirect()->route('admin.trainings.index')->with('success','Training Added Successfully!');
    }

    public function edit(Training $training){
        return view('admin.training.edit',compact('training'),['page_title'=>'Edit Training']);
    }

    public function update(Request $request,Training $training){
        $training->title = $request->title;
        if($request->has('image')){
            $training->image = imageUpload($request->file('image'),'backend/img/training');
        }
        $training->date_time = $request->date_time;
        $training->description = $request->description;
        $training->link = $request->link;
        $training->save();

        return redirect()->route('admin.trainings.index')->with('success','Training Updated Successfully!');
    }

    public function destroy(Training $training){

        $training->delete();

        return redirect()->route('admin.trainings.index')->with('error','Training Deleted Successfully!');
    }

}
