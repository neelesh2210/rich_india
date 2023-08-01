<?php

namespace App\Http\Controllers;

use Auth;
use View;
use Session;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Auth\RegisterController;

class PhonepeController extends Controller
{

    public function payWithPhonePe($request)
    {

        $input = $request->all();
        session()->put('data', $input);
        Session::forget('mm_tid');
        $order_id = date('Ymd-His') . rand(10, 99);
        $merchantTransaction = "MT" . $order_id;
        $grand_total = $request->amount;
        Session::put('mm_tid', $merchantTransaction);
        $data =  $this->payload_creation($grand_total, $request->phone, $merchantTransaction);

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.phonepe.com/apis/hermes/pg/v1/pay",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode(['request' => $data['payload']]),
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json",
                "X-VERIFY:" . $data['base_hash'],
                "accept: application/json"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $payment_response = json_decode($response)->data;
            return $payment_response->instrumentResponse->redirectInfo->url;
        }
    }


    public function payload_creation($amount, $phone, $merchantTransaction)
    {
        $payload = array(
            "merchantId" => 'RICHINDONLINE',
            "merchantTransactionId" => $merchantTransaction,
            "merchantUserId" => "MUID" . rand(1111, 9999),
            "amount" => 1 * 100,
            "redirectUrl" => route('phonepe.redirectUrl'),
            "redirectMode" => "GET",
            "callbackUrl" => route('phonepe.callback'),
            "mobileNumber" => $phone,
            "paymentInstrument" => ["type" => "PAY_PAGE"],
        );

        $payload_json = json_encode($payload);
        $base64_payload = base64_encode($payload_json);



        $salt = '3a716740-03f7-42fa-b559-7e2998582794'; // replace with your actual salt key

        $hash_input = $base64_payload . "/pg/v1/pay" . $salt;

        $sha256_hash = hash('sha256', $hash_input) . '###1';
        return ['payload' => $base64_payload, 'base_hash' => $sha256_hash];
    }

    public function callback(Request $request)
    {
        $response = base64_decode($request);
        $data = json_decode($response);
        return $data;
    }

    public function redirectUrl(Request $request)
    {
        $data = $this->status_check_api();
        $response_data = json_decode($data);
        return $response_data;
        if (!empty($response_data->success)) {
            if ($response_data->success == true) {
                $m_tid = session()->get('mm_tid');
                $input = session()->get('data');

                return 1;
            }
        } else {
            return 2;
        }
    }


    public function payload_creation_status_check()
    {
        $salt = '3a716740-03f7-42fa-b559-7e2998582794'; // replace with your actual salt key

        $hash_input = "/pg/v1/status/RICHINDONLINE/".session()->get('mm_tid').$salt;

        $sha256_hash = hash('sha256', $hash_input).'###1';
        return $sha256_hash;
    }

    public function status_check_api()
    {

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.phonepe.com/apis/hermes/pg/v1/status/RICHINDONLINE/".session()->get('mm_tid'),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json",
                "X-MERCHANT-ID: RICHINDONLINE",
                "X-VERIFY: ".$this->payload_creation_status_check(),
                "accept: application/json"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return $response;
        }
    }
}
