<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FaqController extends Controller
{

    public function index()
    {
        $faqs = Faq::all();

        return view('admin.faq.index',compact('faqs'),['page_title'=>'FAQ']);
    }

    public function store(Request $request)
    {
        $faq = new Faq;

        $faq->title = $request->title;
        $faq->content = $request->content;

        $faq->save();

        return back()->with('success','Faq Added Successfully!');
    }

    public function edit($id)
    {
        $edit_faq = Faq::find(decrypt($id));

        $faqs = Faq::all();

        return view('admin.faq.index',compact('faqs','edit_faq'),['page_title'=>'FAQ']);
    }

    public function update(Request $request,$id)
    {
        $faq = Faq::find(decrypt($id));

        $faq->title = $request->title;
        $faq->content = $request->content;

        $faq->save();

        return redirect()->route('admin.faq.index')->with('success','Faq Updated Successfully!');
    }

    public function destroy($id)
    {
        Faq::destroy(decrypt($id));
        return back()->with('error','Faq Deleted Successfully!');
    }

}
