<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin\Admin;
use App\Models\Admin\Topic;
use App\Models\Admin\Course;
use App\Models\PlanPurchase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{

    public function index(){
        $courses = Course::where('delete_status','0')->where('status','1')->get();
        $topics = Topic::where('delete_status','0')->where('status','1')->get();
        $users = User::where('delete_status','0')->where('status','1')->get();
        $today_total_transaction = PlanPurchase::where('delete_status','0')->whereDate('created_at', Carbon::today())->sum('total_amount');

        return view('admin.dashboard',compact('courses','topics','users','today_total_transaction'),['page_title'=>'Dashboard']);
    }

    public function adminChangePassword(Request $request){
        Admin::where('id',Auth::guard('admin')->user()->id)->update([
            'password'=>Hash::make($request->new_password)
        ]);

        return back()->with('success','Password Updated Successfully!');
    }

}
