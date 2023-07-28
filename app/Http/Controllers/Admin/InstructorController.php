<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Instructor;
use App\Http\Controllers\Controller;

class InstructorController extends Controller
{

    public function index(){
        $instructors = Instructor::orderby('id','desc')->paginate(10);

        return view('admin.instructor.index',compact('instructors'),['page_title'=>'Instructor List']);
    }

    public function create(){
        return view('admin.instructor.create',['page_title'=>'Add Instructor']);
    }

    public function store(Request $request){
        $instructor = new Instructor;
        $instructor->name = $request->name;
        $instructor->designation = $request->designation;
        $instructor->image = imageUpload($request->file('image'),'backend/img/instructors');;
        $instructor->save();

        return redirect()->route('admin.instructors.index')->with('success','Instructor Added Successfully!');
    }

    public function show($id){
        //
    }

    public function edit($id){
        $instructor = Instructor::find(decrypt($id));
        return view('admin.instructor.edit',compact('instructor'),['page_title'=>'Add Instructor']);
    }

    public function update(Request $request, $id){
        $instructor = Instructor::find(decrypt($id));
        $instructor->name = $request->name;
        $instructor->designation = $request->designation;
        if($request->has('image')){
            $instructor->image = imageUpload($request->file('image'),'backend/img/instructors');;
        }
        $instructor->save();

        return redirect()->route('admin.instructors.index')->with('success','Instructor Updated Successfully!');
    }

    public function destroy($id){
        Instructor::destroy(decrypt($id));

        return back()->with('error','Instructor Deleted Successfully!');
    }
}
