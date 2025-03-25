<?php

namespace App\Http\Controllers;

use Session;
use App\Models\User;
use App\Models\BankDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserProfileController extends Controller
{

    public function profile()
    {
        Session::forget('profile_otp');
        $user_details = User::where('id',Auth::guard('web')->user()->id)->with(['sponsorDetail','bankDetail'])->first();
        return view('user_dashboard.profile.user_profile',compact('user_details'));
    }

    public function sendProfileOtp(Request $request){
        $otp = rand(111111,999999);
        Session::put('profile_otp',$otp);

        try {
            Mail::send('email.profile_otp', ['otp' => $otp], function($message){
                $message->to(Auth::guard('web')->user()->email);
                $message->subject('Verify OTP');
            });
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function saveUserProfile(Request $request)
    {
        if(Auth::guard('web')->user()->kyc_status != 'verified'){
            if(Session::get('profile_otp') === $request->otp){
                $this->validate($request,[
                    'avatar'=>'nullable|mimes:png,jpg,jpeg,webp',
                ]);
                $user_detail = User::find(Auth::guard('web')->user()->id);
                $check_phone = User::where('id','!=',$user_detail->id)->where('phone',$request->phone)->first();
                if($check_phone){
                    return back()->with('error','Phone Already Exixts!');
                }else{
                    //$user_detail->name = $request->name;
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

                    Session::forget('profile_otp');

                    return back()->with('success','Profile Updated Successfully!');
                }
            }else{
                return back()->with('error','Invalid OTP Please Reverify Again!');
            }
        }else{
            return back()->with('error','You can not change Profile detail after kyc verification!');
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
        Session::forget('kyc_otp');
        Session::forget('account_otp');
        $user_details = User::where('id',Auth::guard('web')->user()->id)->with(['sponsorDetail','bankDetail'])->first();
        return view('user_dashboard.profile.user_bank_detail',compact('user_details'));
    }

    public function userDocumentDetailSave(Request $request){
        if(Auth::guard('web')->user()->kyc_status != 'verified'){
            if(Session::get('kyc_otp') == $request->otp){
                $this->validate($request,[
                    //'aadhar_name'=>'required',
                    //'aadhar_number'=>'required',
                    //'pan_name'=>'required',
                    //'pan_number'=>'required',
                    'aadhar_front_image'=>'nullable|mimes:png,jpg,jpeg,webp',
                    'aadhar_back_image'=>'nullable|mimes:png,jpg,jpeg,webp',
                    //'pan_image'=>'nullable|mimes:png,jpg,jpeg,webp',
                ]);

                $bank_detail = BankDetail::where('user_id',Auth::guard('web')->user()->id)->first();
                if(!$bank_detail){
                    $bank_detail = new BankDetail;
                    $bank_detail->user_id = Auth::guard('web')->user()->id;
                }
                $bank_detail->aadhar_name = $request->aadhar_name;
                $bank_detail->aadhar_number = $request->aadhar_number;
                $bank_detail->pan_name = $request->pan_name;
                $bank_detail->pan_number = $request->pan_number;
                if($request->hasFile('aadhar_front_image')){
                    $bank_detail->aadhar_front_image = imageUpload($request->file('aadhar_front_image'),'frontend/images/documents');
                }
                if($request->hasFile('aadhar_back_image')){
                    $bank_detail->aadhar_back_image = imageUpload($request->file('aadhar_back_image'),'frontend/images/documents');
                }
                if($request->hasFile('pan_image')){
                    $bank_detail->pan_image = imageUpload($request->file('pan_image'),'frontend/images/documents');
                }
                $bank_detail->save();

                return back()->with('success','Document Detail Saved Successfully!');
            }else{
                return back()->with('error','Invalid OTP Please Reverify Again!');
            }
        }else{
            return back()->with('error','You can not change document detail after kyc verification!');
        }
    }

    public function updateSecurity(Request $request) {
        $request->validate([
            'wallet_pin'    =>  'required|min:6'
        ]);

        $user = User::find(Auth::guard('web')->user()->id);
        $user->wallet_pin = $request->wallet_pin;
        $user->save();

        return back()->with('success','Wallet Pin Updated Successfully!');
    }

}
