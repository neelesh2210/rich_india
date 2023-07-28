<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\MarketingMaterial;

class MarketingMaterialController extends Controller
{

    public function index(){
        $marketing_materials = MarketingMaterial::all();

        return view('admin.marketing_material.index',compact('marketing_materials'),['page_title'=>'Marketing Material']);
    }

    public function store(Request $request){
        $marketing_material = new MarketingMaterial;
        $marketing_material->image = imageUpload($request->file('image'),'backend/img/marketing_materials');
        $marketing_material->save();

        return back()->with('success','Marketing Material Added Successfully!');
    }

    public function destroy($id){
        MarketingMaterial::destroy(decrypt($id));

        return back()->with('error','Marketing Material Deleted Successfully!');
    }

}
