<?php

use App\Models\Admin\WebsiteSetting;

if (! function_exists('generateRandomString')) {
    function generateRandomString($n) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }
}

if (! function_exists('imageUpload')) {
    function imageUpload($file,$path) {
        if($file)
        {
            $image = $file;
            $name = rand().time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path($path);
            $image->move($destinationPath, $name);
        }
        else
        {
            $name='';
        }
        return $name;
    }
}

if (! function_exists('states')) {
    function states() {
        return [
            'Andhra Pradesh',
            'Arunachal Pradesh',
            'Assam',
            'Bihar',
            'Chhattisgarh',
            'Goa',
            'Gujarat',
            'Haryana',
            'Himachal Pradesh',
            'Jharkhand',
            'Karnataka',
            'Kerala',
            'Madhya Pradesh',
            'Maharashtra',
            'Manipur',
            'Meghalaya',
            'Mizoram',
            'Nagaland',
            'Odisha',
            'Punjab',
            'Rajasthan',
            'Sikkim',
            'Tamil Nadu',
            'Telangana',
            'Tripura',
            'Uttarakhand',
            'Uttar Pradesh',
            'West Bengal',
            'Andaman and Nicobar Islands',
            'Chandigarh',
            'Dadra and Nagar Haveli and Daman & Diu',
            'Delhi',
            'Jammu & Kashmir',
            'Ladakh',
            'Lakshadweep',
            'Puducherry'
        ];
    }
}

if (! function_exists('razorpay_payout_bank')){
    function razorpay_payout_bank($user,$amount)
    {
        $amount=$amount*100;
        $curl = curl_init();

        $data = [
            "account_number" =>env('RAZORPAYX_ACCOUNT_NUMBER'),
            "amount"=>$amount,
            "currency"=>"INR",
            "mode"=>"IMPS",
            "purpose"=>"payout",
            "fund_account" => [
                "account_type" =>"bank_account",
                "bank_account" =>[
                    "name"=>$user->bankDetail->holder_name,
                    "ifsc"=>$user->bankDetail->ifsc_code,
                    "account_number"=>$user->bankDetail->account_number,
                ],
                "contact"=>[
                    "name"=>$user->name,
                    "email"=>$user->email,
                    "contact"=>$user->phone,
                    "type"=>"customer",
                    "reference_id"=>"",
                    "notes"=>[
                        "notes_key_1"=>"Tea, Earl Grey, Hot",
                        "notes_key_2"=>"Tea, Earl Grey… decaf."
                    ]
                ]
            ],
            "queue_if_low_balance"=>true,
            "reference_id"=>"Acme Transaction ID 12345",
            "narration"=>"Acme Corp Fund Transfer",
            "notes"=>[
                "notes_key_1"=>"Beam me up Scotty",
                "notes_key_2"=>"Engage"
            ]
        ];

        $encodedData = json_encode($data);


        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.razorpay.com/v1/payouts',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>$encodedData,
        CURLOPT_HTTPHEADER => array(
            'Authorization: Basic '.env("RAZORPAYX_AUTHORIZATION"),
            'Content-Type: application/json'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }
}

if (! function_exists('razorpay_payout_upi')){
    function razorpay_payout_upi($user,$amount)
    {
        $curl = curl_init();

        $data = [
            "account_number" =>env('RAZORPAYX_ACCOUNT_NUMBER'),
            "amount"=>$amount*100,
            "currency"=>"INR",
            "mode"=>"UPI",
            "purpose"=>"payout",
            "fund_account" => [
                "account_type" =>"vpa",
                "vpa" =>[
                    "address"=>$user->bankDetail->upi_id,
                ],
                "contact"=>[
                    "name"=>$user->name,
                    "email"=>$user->email,
                    "contact"=>$user->phone,
                    "type"=>"customer",
                    "reference_id"=>"Acme Contact ID 12345",
                    "notes"=>[
                        "notes_key_1"=>"Tea, Earl Grey, Hot",
                        "notes_key_2"=>"Tea, Earl Grey… decaf."
                    ]
                ]
            ],
            "queue_if_low_balance"=>true,
            "reference_id"=>"Acme Transaction ID 12345",
            "narration"=>"Acme Corp Fund Transfer",
            "notes"=>[
                "notes_key_1"=>"Beam me up Scotty",
                "notes_key_2"=>"Engage"
            ]
        ];

        $encodedData = json_encode($data);

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.razorpay.com/v1/payouts',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>$encodedData,
            CURLOPT_HTTPHEADER => array(
                'X-Payout-Idempotency: ',
                'Authorization: Basic '.env("RAZORPAYX_AUTHORIZATION"),
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }
}

if (!function_exists('socialMediaLink')) {
    function socialMediaLink($name) {
        $website_setting = WebsiteSetting::where('type','social')->where('content',$name)->first();
        return $website_setting ? $website_setting->url : "";
    }
}

if (!function_exists('websiteData')) {
    function websiteData($type) {
        $website_data = WebsiteSetting::where('type',$type)->first();
        return $website_data ? $website_data->content : "";
    }
}

function hex2rgba($color, $opacity = false) {

    $default = 'rgb(230,46,4)';

    //Return default if no color provided
    if(empty($color))
          return $default;

    //Sanitize $color if "#" is provided
    if ($color[0] == '#' ) {
        $color = substr( $color, 1 );
    }

    //Check if color has 6 or 3 characters and get values
    if (strlen($color) == 6) {
        $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
    } elseif ( strlen( $color ) == 3 ) {
        $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
    } else {
        return $default;
    }

    //Convert hexadec to rgb
    $rgb = array_map('hexdec', $hex);

    //Check if opacity is set(rgba or rgb)
    if($opacity){
        if(abs($opacity) > 1)
            $opacity = 1.0;
        $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
    } else {
        $output = 'rgb('.implode(",",$rgb).')';
    }

    //Return rgb(a) color string
    return $output;
}

function compress($src, $dist, $dis_width =500) {
    $img = '';
    $extension = strtolower(strrchr($src, '.'));
    switch($extension)
    {
        case '.jpg':
        case '.jpeg':
            $img = imagecreatefromjpeg($src);
            break;
        case '.gif':
            $img = imagecreatefromgif($src);
            break;
        case '.png':
            $img = imagecreatefrompng($src);
            break;
    }
    $width = imagesx($img);
    $height = imagesy($img);
    $dis_height = $dis_width * ($height / $width);
    $new_image = imagecreatetruecolor($dis_width, $dis_height);
    imagecopyresampled($new_image, $img, 0, 0, 0, 0, $dis_width, $dis_height, $width, $height);
    $imageQuality = 90;
    switch($extension)
    {
        case '.jpg':
        case '.jpeg':
            if (imagetypes() & IMG_JPG) {
                imagejpeg($new_image, $dist, $imageQuality);
            }
            break;
        case '.gif':
            if (imagetypes() & IMG_GIF) {
                imagegif($new_image, $dist);
            }
            break;
        case '.png':
            $scaleQuality = round(($imageQuality/100) * 9);
            $invertScaleQuality = 9 - $scaleQuality;
            if (imagetypes() & IMG_PNG) {
                imagepng($new_image, $dist, $invertScaleQuality);
            }
            break;
    }
    imagedestroy($new_image);
    return filesize($src);
}
