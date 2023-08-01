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
        //if(Session::get('otp') == $request->otp){
            BankDetail::updateOrCreate([
                'user_id'=>Auth::guard('web')->user()->id
            ],[
                'holder_name'=>$request->holder_name,
                'ifsc_code'=>$request->ifsc_code,
                'account_number'=>$request->account_number,
                'bank_name'=>$request->bank_name,
                'upi_id'=>$request->upi_id
            ]);
            //Session::forget('otp');
            return back()->with('success','Bank Detail Updated Successfully!');
        //}else{
            //return back()->withInput($request->all())->with('error','Wrong OTP!');
        //}
    }

    public function verifyEmail(){
        $otp = rand(1111,9999);
        Session::put('otp',$otp);
        Mail::send('email.verify_email_bank', ['otp' => $otp], function($message){
            $message->to(Auth::guard('web')->user()->email);
            $message->subject('Verify OTP');
        });
    }

}
