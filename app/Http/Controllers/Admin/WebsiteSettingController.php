<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\WebsiteSetting;

class WebsiteSettingController extends Controller
{

    public function index(Request $request)
    {
        if($request->type == 'sliders'){
            $websitesettings = WebsiteSetting::where('type','slider_desktop')->orWhere('type','slider_mobile')->get();
            return view('admin.websitesetting.index',compact('websitesettings'),['page_title'=>'Sliders']);
        }

        if($request->type == 'social'){
            return view('admin.websitesetting.social',['page_title'=>'Social Media Link']);
        }

        if($request->type == 'website_data'){
            return view('admin.websitesetting.website_data',['page_title'=>'Website Data']);
        }

        if($request->type == 'social_handle'){
            return view('admin.websitesetting.social_handle',['page_title'=>'Social Media Handel']);
        }

        if($request->type == 'meetup'){
            $meetups = WebsiteSetting::where('type','meetup')->get();
            return view('admin.websitesetting.meetup',compact('meetups'),['page_title'=>'Meetup']);
        }

    }

    public function store(Request $request)
    {

        if($request->type == 'sliders'){
            $websitesetting = new WebsiteSetting;
            $websitesetting->type = $request->for;
            $websitesetting->content = imageUpload($request->file('image'),'backend/img/websitesetting/sliders');
            $websitesetting->url = $request->url;
            $websitesetting->save();
        }

        if($request->type == 'meetup'){
            $websitesetting = new WebsiteSetting;
            $websitesetting->type = 'meetup';
            $websitesetting->content = imageUpload($request->file('image'),'backend/img/websitesetting/meetup');
            $websitesetting->save();
        }

        if($request->type == 'social'){
            foreach($request->social as $social){
                WebsiteSetting::updateOrCreate([
                    'type'=>'social',
                    'content'=>$social
                ],[
                    'url'=>$request->$social
                ]);
            }
        }

        if($request->type == 'website_data'){
            WebsiteSetting::updateOrCreate([
                'type'=>'address',
            ],[
                'content'=>$request->address
            ]);

            WebsiteSetting::updateOrCreate([
                'type'=>'email',
            ],[
                'content'=>$request->email
            ]);

            WebsiteSetting::updateOrCreate([
                'type'=>'whatsapp',
            ],[
                'content'=>$request->whatsapp
            ]);

            WebsiteSetting::updateOrCreate([
                'type'=>'support_phone',
            ],[
                'content'=>json_encode($request->support_phone)
            ]);
            WebsiteSetting::updateOrCreate([
                'type'=>'telegram',
            ],[
                'content'=>$request->telegram
            ]);

            if($request->has('qr_code')){
                WebsiteSetting::updateOrCreate([
                    'type'=>'qr_code',
                ],[
                    'content'=>imageUpload($request->file('qr_code'),'frontend/assets/images')
                ]);
            }
        }

        if($request->type == 'social_handle'){
            //return $request->all();

            if($request->whatsapp_title){
                $whatspp = [];

                foreach ($request->whatsapp_title as $key=>$wpname) {
                    array_push($whatspp,array('title'=>$wpname,'link'=>$request->whatsapp[$key]));
                }

                WebsiteSetting::updateOrCreate([
                    'type'=>'whatsappgroup',
                ],[
                    'content'=>json_encode($whatspp)
                ]);
            }

            if($request->title_telegram){
                $telegram = [];

                foreach ($request->title_telegram as $key=>$telname) {
                    array_push($telegram,array('title'=>$telname,'link'=>$request->telegram[$key]));
                }

                WebsiteSetting::updateOrCreate([
                    'type'=>'telegramgroup',
                ],[
                    'content'=>json_encode($telegram)
                ]);
            }

            if($request->title_instagram){
                $instagram = [];

                foreach ($request->title_instagram as $key=>$instaname) {
                    array_push($instagram,array('title'=>$instaname,'link'=>$request->instagram[$key]));
                }

                WebsiteSetting::updateOrCreate([
                    'type'=>'instagramgroup',
                ],[
                    'content'=>json_encode($instagram)
                ]);
            }

            if($request->name){
                $founder = [];

                foreach ($request->name as $key=>$name) {
                    if(isset($request->file('image')[$key])){
                        $image = imageUpload($request->file('image')[$key],'backend/img/websitesetting/founder');
                    }else{
                        if(websiteData('foundergroup')){
                            $image = json_decode(websiteData('foundergroup'))[$key]->image;
                        }else{
                            $image = null;
                        }
                    }
                    array_push($founder,array('name'=>$name,'link'=>$request->link[$key],'position'=>$request->position[$key],'image'=>$image));
                }

                WebsiteSetting::updateOrCreate([
                    'type'=>'foundergroup',
                ],[
                    'content'=>json_encode($founder)
                ]);
            }
        }

        if($request->type == 'statistics'){
            WebsiteSetting::updateOrCreate([
                'type'=>'trainers',
            ],[
                'content'=>$request->trainers
            ]);

            WebsiteSetting::updateOrCreate([
                'type'=>'students',
            ],[
                'content'=>$request->students
            ]);

            WebsiteSetting::updateOrCreate([
                'type'=>'live_training',
            ],[
                'content'=>$request->live_training
            ]);

            WebsiteSetting::updateOrCreate([
                'type'=>'community_earning',
            ],[
                'content'=>$request->community_earning
            ]);
        }

        return back()->with('success','Data Added Successfully!');
    }

    public function destroy($id)
    {
        WebsiteSetting::destroy(decrypt($id));

        return back()->with('error','Data Deleted Successfully!');
    }

}
