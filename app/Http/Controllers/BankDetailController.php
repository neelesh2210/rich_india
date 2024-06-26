<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Models\BankDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BankDetailController extends Controller
{

    public function store(Request $request){
        if(Auth::guard('web')->user()->kyc_status != 'verified'){
            if(Session::get('account_otp') == $request->otp){
                BankDetail::updateOrCreate([
                    'user_id'=>Auth::guard('web')->user()->id
                ],[
                    'holder_name'=>$request->holder_name,
                    'ifsc_code'=>$request->ifsc_code,
                    'account_number'=>$request->account_number,
                    'bank_name'=>$request->bank_name,
                    'upi_id'=>$request->upi_id
                ]);
                Session::forget('account_otp');
                return back()->with('success','Bank Detail Updated Successfully!');
            }else{
                return back()->withInput($request->all())->with('error','Wrong OTP!');
            }
        }else{
            return back()->with('error','You can not change bank detail after kyc verification!');
        }
    }

    public function verifyEmail(){
        $otp = rand(1111,9999);
        Session::put('kyc_otp',$otp);
        Mail::send('email.verify_email_bank', ['otp' => $otp], function($message){
            $message->to(Auth::guard('web')->user()->email);
            $message->subject('Verify OTP');
        });
    }

    public function verifyAccount(){
        $otp = rand(1111,9999);
        Session::put('account_otp',$otp);
        Mail::send('email.verify_email_bank', ['otp' => $otp], function($message){
            $message->to(Auth::guard('web')->user()->email);
            $message->subject('Verify OTP');
        });
    }

}
