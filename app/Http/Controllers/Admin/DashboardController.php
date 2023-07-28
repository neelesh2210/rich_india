<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin\Admin;
use App\Models\PlanPurchase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{

    public function index(){
        $dates = [];
        foreach( range( -6, 0 ) AS $i ) {
            $date = Carbon::now()->addDays( $i )->format( 'Y-m-d' );
            array_push($dates,$date);
        }
        $week_users=[];
        foreach($dates as $date)
        {
            $users = User::where('delete_status','0')->whereDate('created_at',$date )->count();
            $week_users[]=$users;
        }

        $week_payments=[];
        foreach($dates as $date)
        {
            $payments = PlanPurchase::where('delete_status','0')->whereDate('created_at',$date )->sum('total_amount');
            $week_payments[]=$payments;
        }

        return view('admin.dashboard',compact('dates','week_users','week_payments'),['page_title'=>'Dashboard']);
    }

    public function adminChangePassword(Request $request){
        Admin::where('id',Auth::guard('admin')->user()->id)->update([
            'password'=>Hash::make($request->new_password)
        ]);

        return back()->with('success','Password Updated Successfully!');
    }

}
