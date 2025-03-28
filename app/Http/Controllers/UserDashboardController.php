<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Commission;
use App\Models\Admin\Payout;
use Illuminate\Http\Request;
use App\Models\Admin\Webinar;
use App\Models\LevelUpWallet;
use App\Models\Admin\Training;
use App\Models\Admin\UserDetail;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\HideLeaderboardUser;

class UserDashboardController extends Controller
{

    public function dashboard(Request $request)
    {
        $today_earning = Commission::where('delete_status','0')->where('user_id',Auth::guard('web')->user()->id)->whereDate('created_at', Carbon::today())->sum('commission');
        $last_week_earning = Commission::where('delete_status','0')->where('user_id',Auth::guard('web')->user()->id)->whereDate('created_at', '>=', Carbon::now()->subDays(7))->sum('commission');
        $last_month_earning = Commission::where('delete_status','0')->where('user_id',Auth::guard('web')->user()->id)->whereDate('created_at', '>=', Carbon::now()->subDays(30))->sum('commission');
        $all_time_earning = Commission::where('delete_status','0')->where('user_id',Auth::guard('web')->user()->id)->sum('commission');
        $active_income = Commission::where('delete_status','0')->where('user_id',Auth::guard('web')->user()->id)->where('level',1)->sum('commission');
        $passive_income = Commission::where('delete_status','0')->where('user_id',Auth::guard('web')->user()->id)->where('level','>',1)->sum('commission');
        $withdrawal_amount = Payout::where('user_id',Auth::guard('web')->user()->id)->sum('amount');
        $old_payout = UserDetail::where('user_id',Auth::guard('web')->user()->id)->first();
        $remaining_amount = $all_time_earning - $withdrawal_amount;
        $type = $request->type;

        $dates = [];
        foreach( range( -6, 0 ) AS $i ) {
            $date = Carbon::now()->addDays( $i )->format( 'Y-m-d' );
            array_push($dates,$date);
        }
        $values=[];
        foreach($dates as $date)
        {
            $posts = Commission::where('delete_status','0')->where('user_id',Auth::guard('web')->user()->id)->whereDate('created_at',$date )->sum('commission');
            $values[]=$posts;
        }

        $today_leaderboards = Commission::select('user_id')->where('delete_status','0')->whereDate('created_at', Carbon::now())->selectRaw('round(sum(commission),2) as total_commission')->with('user.userDetail')->whereHas('user', function($q){
            $q->where('status','1');
        })->groupBy('user_id')->orderBy('total_commission','desc')->take(10)->get();

        $last_week_leaderboards = Commission::select('user_id')->where('delete_status','0')->whereDate('created_at', '>=', Carbon::now()->subDays(7))->selectRaw('round(sum(commission),2) as total_commission')->with('user.userDetail')->whereHas('user', function($q){
            $q->where('status','1');
        })->groupBy('user_id')->orderBy('total_commission','desc')->take(10)->get();
        $last_month_leaderboards = Commission::select('user_id')->where('delete_status','0')->whereDate('created_at', '>=', Carbon::now()->subDays(30))->selectRaw('round(sum(commission),2) as total_commission')->with('user.userDetail')->whereHas('user', function($q){
            $q->where('status','1');
        })->groupBy('user_id')->orderBy('total_commission','desc')->take(10)->get();

        if($type == 'old'){
            return view('user_dashboard.dashboard',compact('today_earning',
                                                            'last_week_earning',
                                                            'last_month_earning',
                                                            'all_time_earning',
                                                            'withdrawal_amount',
                                                            'remaining_amount',
                                                            'active_income',
                                                            'passive_income',
                                                            'dates',
                                                            'values',
                                                            'old_payout',
                                                            'last_week_leaderboards',
                                                            'last_month_leaderboards',
                                                            'today_leaderboards',
                                                            'type'
                                                        ));
        }

        return view('user_dashboard.new_dashboard',compact('today_earning',
                                                        'last_week_earning',
                                                        'last_month_earning',
                                                        'all_time_earning',
                                                        'withdrawal_amount',
                                                        'remaining_amount',
                                                        'active_income',
                                                        'passive_income',
                                                        'dates',
                                                        'values',
                                                        'old_payout',
                                                        'last_week_leaderboards',
                                                        'last_month_leaderboards',
                                                        'today_leaderboards',
                                                        'type'
                                                    ));
    }

    public function leaderboard()
    {
        $hide_leaderboard_users = HideLeaderboardUser::pluck('user_id')->toArray();

        $today_leaderboards = Commission::select('user_id')->where('delete_status','0')->whereNotIn('user_id',$hide_leaderboard_users)->whereDate('created_at', Carbon::now())->selectRaw('round(sum(commission),2) as total_commission')->with('user.userDetail')->whereHas('user', function($q){
            $q->where('status','1');
        })->groupBy('user_id')->orderBy('total_commission','desc')->take(10)->get();

        $last_week_leaderboards = Commission::select('user_id')->where('delete_status','0')->whereNotIn('user_id',$hide_leaderboard_users)->whereDate('created_at', '>=', Carbon::now()->subDays(7))->selectRaw('round(sum(commission),2) as total_commission')->with('user.userDetail')->whereHas('user', function($q){
            $q->where('status','1');
        })->groupBy('user_id')->orderBy('total_commission','desc')->take(10)->get();

        $last_month_leaderboards = Commission::select('user_id')->where('delete_status','0')->whereNotIn('user_id',$hide_leaderboard_users)->whereDate('created_at', '>=', Carbon::now()->subDays(30))->selectRaw('round(sum(commission),2) as total_commission')->with('user.userDetail')->whereHas('user', function($q){
            $q->where('status','1');
        })->groupBy('user_id')->orderBy('total_commission','desc')->take(10)->get();

        $all_time_leaderboards = Commission::select('user_id')->where('delete_status','0')->whereNotIn('user_id',$hide_leaderboard_users)->selectRaw('round(sum(commission),2) as total_commission')->with('user.userDetail')->whereHas('user', function($q){
            $q->where('status','1');
        })->groupBy('user_id')->get();

        $all_time_leaderboards = $all_time_leaderboards->map(function ($item) {
            $item->total_commission = round($item->total_commission + $item->user->userDetail->old_paid_payout + $item->user->userDetail->old_not_paid_payout,0);
            return $item;
        });

        $all_time_leaderboards = $all_time_leaderboards->sortByDesc('total_commission')->take(10)->values();

        return view('user_dashboard.affiliate.leaderboard',compact('last_week_leaderboards','last_month_leaderboards','all_time_leaderboards','today_leaderboards'));
    }

    function sort_array_by_key($array, $sort_key){
        $key_array = array_column($array, $sort_key);
        array_multisort($key_array, SORT_DESC, $array);
        return $array;
    }

    public function webinar(){
        $webinars = Webinar::all();
        return view('user_dashboard.webinar',compact('webinars'));
    }

    public function training(){
        $trainings = Training::all();
        return view('user_dashboard.training',compact('trainings'));
    }

}
