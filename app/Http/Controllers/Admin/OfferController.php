<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Offer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OfferController extends Controller
{

    public function index(){
        $offers = Offer::all();

        return view('admin.offer.index',compact('offers'),['page_title'=>'Offers']);
    }

    public function store(Request $request){
        $offer = new Offer;
        $offer->image = imageUpload($request->file('image'),'backend/img/offers');
        $offer->save();

        return back()->with('success','Offer Added Successfully!');
    }

    public function destroy($id){
        Offer::destroy(decrypt($id));

        return back()->with('error','Offer Deleted Successfully!');
    }

}
