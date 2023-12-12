<?php

namespace App\Http\Controllers;

use Auth;
use View;
use Session;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Auth\RegisterController;


class InstamojoController extends Controller
{
    public function pay($request){
        $input=$request->all();

        $endPoint = env('INSTAMOJO_END_POINT');
        $api = new \Instamojo\Instamojo(
            env('INSTAMOJO_KEY'),
            env('INSTAMOJO_AUTHORIZATION'),
            $endPoint
        );

        if(preg_match_all('/^(?:(?:\+|0{0,2})91(\s*[\ -]\s*)?|[0]?)?[6789]\d{9}|(\d[ -]?){10}\d$/im', $request->phone)){
            try {
                $response = $api->paymentRequestCreate(array(
                    "purpose" =>'Form Payment',
                    "amount" => $request->amount,
                    "buyer_name" => $request->name,
                    "send_email" => true,
                    "send_sms"=>true,
                    "email" => $request->email,
                    "phone" => $request->phone,
                    "redirect_url" => url('instamojo/payment/pay-success')
                ));
                session()->put('data',$input);
                return $response['longurl'];

            }catch (Exception $e) {
                print('Error: ' . $e->getMessage());
            }
        }
        else{
            return redirect()->back();
        }
    }

    public function success(Request $request){
        try {
            $endPoint = env('INSTAMOJO_END_POINT');
            $api = new \Instamojo\Instamojo(
                env('INSTAMOJO_KEY'),
                env('INSTAMOJO_AUTHORIZATION'),
                $endPoint
            );

            $response = $api->paymentRequestStatus(request('payment_request_id'));

            if(!isset($response['payments'][0]['status']) ) {
                return redirect()->route('home');
            } else if($response['payments'][0]['status'] != 'Credit') {
                return redirect()->route('home');
            }
        }catch(\Exception $e){
            return redirect()->route('home');
        }
        $payment = json_encode($response);
        $input=session()->get('data');

        $request->request->add($input);
        $payment_detalis = json_encode(array('id' => $request->payment_id,'method' => 'instamojo','amount' => $request->amount,'currency' => 'INR'));
        $request->request->add(['payment_detalis' => $payment_detalis]);
        session()->forget('data');
        $register = new RegisterController;
        return $register->register($request);
    }

    public function upgrade_plan($request){

        $input=$request->all();
        $endPoint = env('INSTAMOJO_END_POINT');
        $api = new \Instamojo\Instamojo(
            env('INSTAMOJO_KEY'),
            env('INSTAMOJO_AUTHORIZATION'),
            $endPoint
        );

        if(preg_match_all('/^(?:(?:\+|0{0,2})91(\s*[\ -]\s*)?|[0]?)?[6789]\d{9}|(\d[ -]?){10}\d$/im',  Auth::guard('web')->user()->phone)){
            try {
                $response = $api->paymentRequestCreate(array(
                    "purpose" =>'Updrade Plan',
                    "amount" => $request->amount,
                    "buyer_name" => Auth::guard('web')->user()->name,
                    "send_email" => true,
                    "send_sms"=>true,
                    "email" => Auth::guard('web')->user()->email,
                    "phone" => Auth::guard('web')->user()->phone,
                    "redirect_url" => url('user/instamojo/payment/pay-success-upgrade')
                ));
                session()->put('data_upgrade',$input);
                return $response['longurl'];
            }catch (Exception $e) {
                print('Error: ' . $e->getMessage());
            }
        }
        else{
            return redirect()->back();
        }
    }

    public function upgrade_success(Request $request){
        try {
            $endPoint = env('INSTAMOJO_END_POINT');
            $api = new \Instamojo\Instamojo(
                env('INSTAMOJO_KEY'),
                env('INSTAMOJO_AUTHORIZATION'),
                $endPoint
            );

            $response = $api->paymentRequestStatus(request('payment_request_id'));

            if(!isset($response['payments'][0]['status']) ) {
                return redirect()->route('home');
            } else if($response['payments'][0]['status'] != 'Credit') {
                return redirect()->route('home');
            }
        }catch (\Exception $e) {
            return redirect()->route('home');
        }
        $payment = json_encode($response);
        $input=session()->get('data_upgrade');


        $request->request->add($input);
        $payment_detalis = json_encode(array('id' => $request->payment_id,'method' => 'instamojo','amount' => $request->amount,'currency' => 'INR'));
        $request->request->add(['upgrade_plan_id' =>$input['upgrade_plan_id'],'payment_detalis' => $payment_detalis]);
        session()->forget('data_upgrade');
        $plan = new PlanController;
        return $plan->upgradePlan($request);
    }
}
