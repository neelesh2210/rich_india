<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RegistrationErrorLog;

class ErrorRegistrationController extends Controller
{
    public function index(Request $request){
        $search_key = $request->search_key;
        $search_date = $request->search_date;

        $error_registrations = RegistrationErrorLog::orderBy('id','desc');

        if($search_date){
            $dates=explode('-',$search_date);
            $d1=strtotime($dates[0]);
            $d2=strtotime($dates[1]);
            $da1=date('Y-m-d',$d1);
            $da2=date('Y-m-d',$d2);
            $startDate = Carbon::createFromFormat('Y-m-d', $da1)->startOfDay();
            $endDate = Carbon::createFromFormat('Y-m-d', $da2)->endOfDay();

            $search_date=$dates[0].'-'.$dates[1];
            $error_registrations = $error_registrations->whereBetween('created_at', [$startDate, $endDate]);
        }

        if($search_key){
            $error_registrations = $error_registrations->where(function ($query) use ($search_key){
                $query->where('name','like','%'.$search_key.'%')
                      ->orWhere('email','like','%'.$search_key.'%')
                      ->orWhere('phone','like','%'.$search_key.'%')
                      ->orWhere('referral_code','like','%'.$search_key.'%');
            });
        }

        $error_registrations = $error_registrations->simplePaginate(10);

        return view('admin.error_registration.index',compact('error_registrations','search_key','search_date'),['page_title'=>'Error Registration']);
    }
}
