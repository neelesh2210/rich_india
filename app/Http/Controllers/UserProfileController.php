<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{

    public function profile()
    {
        $user_details = User::where('id',Auth::guard('web')->user()->id)->with(['sponsorDetail','bankDetail'])->first();
        return view('user_dashboard.profile.user_profile',compact('user_details'));
    }

    public function saveUserProfile(Request $request)
    {
        $this->validate($request,[
            'avatar'=>'nullable|mimes:png,jpg,jpeg,webp',
        ]);
        $user_detail = User::find(Auth::guard('web')->user()->id);
        $check_phone = User::where('id','!=',$user_detail->id)->where('phone',$request->phone)->first();
        if($check_phone){
            return back()->with('error','Phone Already Exixts!');
        }else{
            $user_detail->name = $request->name;
            $user_detail->gender = $request->gender;
            $user_detail->state = $request->state;
            $user_detail->city = $request->city;
            $user_detail->pincode = $request->pincode;
            $user_detail->address = $request->address;
            $user_detail->phone = $request->phone;
            if($request->has('avatar')){
                $user_detail->avatar = imageUpload($request->file('avatar'),'frontend/images/avatar');
                $src= "frontend/images/avatar/".$user_detail->avatar;
                compress($src, $src, 500, $user_detail->avatar);
            }
            $user_detail->save();

            return back()->with('success','Profile Updated Successfully!');
        }
    }

    public function updatePassword(Request $request){
        if($request->password == $request->confirm_password){
            User::where('id',Auth::guard('web')->user()->id)->update(['password'=>Hash::make($request->password)]);
            return back()->with('success','Password Updated Successfully.');
        }else{
            return back()->with('error','Confirm Password not Matched.');
        }
    }

    public function bankDetail(){
        $user_details = User::where('id',Auth::guard('web')->user()->id)->with(['sponsorDetail','bankDetail'])->first();
        return view('user_dashboard.profile.user_bank_detail',compact('user_details'));
    }

}
