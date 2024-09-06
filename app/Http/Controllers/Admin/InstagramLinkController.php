<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\InstagramLink;
use App\Http\Controllers\Controller;

class InstagramLinkController extends Controller
{

    public function index(){
        $instagram_links = InstagramLink::all();

        return view('admin.instagram_link.index',compact('instagram_links'),['page_title'=>'Instagram Links List']);
    }

    public function store(Request $request){
        $instagram_link = new InstagramLink;
        $instagram_link->link = $request->link;
        $instagram_link->save();

        return redirect()->route('admin.instagram-link.index')->with('success','Instagram Link Added Successfully!');
    }

    public function edit(InstagramLink $instagram_link){
        $edit_instagram_link = $instagram_link;
        $instagram_links = InstagramLink::all();

        return view('admin.instagram_link.index',compact('instagram_links','edit_instagram_link'),['page_title'=>'Instagram Link List']);
    }

    public function update(Request $request, InstagramLink $instagram_link){
        $instagram_link->link = $request->link;
        $instagram_link->save();

        return redirect()->route('admin.instagram-link.index')->with('success','Instagram Link Updated Successfully!');
    }

    public function destroy(InstagramLink $instagram_link){
        $instagram_link->delete();

        return redirect()->route('admin.instagram-link.index')->with('error','Instagram Link Deleted Successfully!');
    }

}
