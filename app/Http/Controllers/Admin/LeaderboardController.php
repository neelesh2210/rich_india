<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Commission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LeaderboardController extends Controller
{

    public function index(Request $request)
    {
        $last_week_leaderboards = Commission::select('user_id')->where('delete_status','0')->where('user_id','!=',1)->where('user_id','!=',2)->whereDate('created_at', '>=', Carbon::now()->subDays(7))->selectRaw('round(sum(commission),2) as total_commission')->with('user.userDetail')->whereHas('user', function($q){
            $q->where('status','1');
        })->groupBy('user_id')->orderBy('total_commission','desc')->take(10)->get();
        $last_month_leaderboards = Commission::select('user_id')->where('delete_status','0')->where('user_id','!=',1)->where('user_id','!=',2)->whereDate('created_at', '>=', Carbon::now()->subDays(30))->selectRaw('round(sum(commission),2) as total_commission')->with('user.userDetail')->whereHas('user', function($q){
            $q->where('status','1');
        })->groupBy('user_id')->orderBy('total_commission','desc')->take(10)->get();
        $all_time_leaderboards = Commission::select('user_id')->where('delete_status','0')->where('user_id','!=',1)->where('user_id','!=',2)->selectRaw('round(sum(commission),2) as total_commission')->with('user.userDetail')->whereHas('user', function($q){
            $q->where('status','1');
        })->groupBy('user_id')->get();

        foreach($all_time_leaderboards as $key => $all_time_leaderboard){
            $all_time_leaderboard->total_commission = round($all_time_leaderboard->total_commission + $all_time_leaderboard->user->userDetail->old_paid_payout + $all_time_leaderboard->user->userDetail->old_not_paid_payout,0);
        }
        $sorted_products = $this->sort_array_by_key($all_time_leaderboards->toArray(), 'total_commission');
        $all_time_leaderboards = array_slice($sorted_products, 0, 10);

        return view('admin.leaderboard.index',compact('last_week_leaderboards','last_month_leaderboards','all_time_leaderboards'),['page_title'=>'Leaderboard']);
    }

    function sort_array_by_key($array, $sort_key){
        $key_array = array_column($array, $sort_key);
        array_multisort($key_array, SORT_DESC, $array);
        return $array;
    }

}
