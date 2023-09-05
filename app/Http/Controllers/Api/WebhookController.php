<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\WebsiteSetting;
use App\Http\Controllers\Admin\UserController;

class WebhookController extends Controller
{

    public function store(Request $request){
        $registration = new UserController;

        return $registration->webhookRegistration($request);
    }

}
