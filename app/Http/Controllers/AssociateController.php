<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssociateController extends Controller
{

    public function associate()
    {
        $associates = User::where('delete_status','0')->where('referral_code',Auth::guard('web')->user()->referrer_code)->paginate(10);

        return view('user_dashboard.affiliate.associate',compact('associates'));
    }

}
