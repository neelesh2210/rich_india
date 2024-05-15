<?php

namespace App\Http\Controllers\Admin;

use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LanguageController extends Controller
{

    public function index(){
        $languages = Language::where('is_delete','0')->get();

        return view('admin.language.index',compact('languages'),['page_title'=>'Language List']);
    }

    public function store(Request $request){
        $language = new Language;
        $language->name = $request->name;
        $language->save();

        return redirect()->route('admin.language.index')->with('success','Language Added Successfully!');
    }

    public function edit(Language $language){
        $edit_language = $language;
        $languages = Language::where('is_delete','0')->get();

        return view('admin.language.index',compact('languages','edit_language'),['page_title'=>'Language List']);
    }

    public function update(Request $request, Language $language){
        $language->name = $request->name;
        $language->save();

        return redirect()->route('admin.language.index')->with('success','Language Updated Successfully!');
    }

    public function destroy(Language $language){
        $language->is_delete = '1';
        $language->save();

        return redirect()->route('admin.language.index')->with('error','Language Deleted Successfully!');
    }

}
