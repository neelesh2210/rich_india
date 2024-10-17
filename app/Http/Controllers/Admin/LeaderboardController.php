<?php

namespace App\Http\Controllers\Admin;

use Session;
use Carbon\Carbon;
use App\CPU\UserManager;
use App\Models\Commission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\HideLeaderboardUser;

class LeaderboardController extends Controller
{

    public function index(Request $request)
    {
        $hide_leaderboard_users = HideLeaderboardUser::pluck('user_id')->toArray();

        $last_week_leaderboards = Commission::where('delete_status','0')->whereNotIn('user_id',$hide_leaderboard_users)->whereDate('created_at', '>=', Carbon::now()->subDays(7))->selectRaw('user_id,round(sum(commission),2) as total_commission')->with(['user' => function($query) {
            $query->where('status', '1')->with('userDetail');
        }])->groupBy('user_id')->orderBy('total_commission','desc')->take(10)->get();

        $last_month_leaderboards = Commission::where('delete_status','0')->whereNotIn('user_id',$hide_leaderboard_users)->whereDate('created_at', '>=', Carbon::now()->subDays(30))->selectRaw('user_id,round(sum(commission),2) as total_commission')->with(['user' => function($query) {
            $query->where('status', '1')->with('userDetail');
        }])->groupBy('user_id')->orderBy('total_commission','desc')->take(10)->get();


        return view('admin.leaderboard.index',compact('last_week_leaderboards','last_month_leaderboards'),['page_title'=>'Leaderboard']);
    }

    public function getUser(Request $request){
        $search_key = $request->search_key;
        $search_date = $request->search_date;
        $users = UserManager::withoutTrash()->with('sponsorDetail')->withSum('payout','amount');
        if($search_date)
        {
            $dates=explode('-',$search_date);
            $d1=strtotime($dates[0]);
            $d2=strtotime($dates[1]);
            $da1=date('Y-m-d',$d1);
            $da2=date('Y-m-d',$d2);
            $startDate = Carbon::createFromFormat('Y-m-d', $da1)->startOfDay();
            $endDate = Carbon::createFromFormat('Y-m-d', $da2)->endOfDay();

            $search_date=$dates[0].'-'.$dates[1];
            $users=$users->whereBetween('created_at', [$startDate, $endDate]);
        }
        if($search_key)
        {
            $users=$users->where(function ($query) use ($search_key){
                $query->where('name','like','%'.$search_key.'%')
                      ->orWhere('email','like','%'.$search_key.'%')
                      ->orWhere('phone','like','%'.$search_key.'%')
                      ->orWhere('referrer_code','like','%'.$search_key.'%');
            });
        }
        $users = $users->orderBy('created_at','desc')->paginate(10);

        if(!$request->ajax()){
            Session::forget('leaderboard_user_ids');
            $hide_leaderboard_users = HideLeaderboardUser::pluck('user_id')->toArray();
            Session::put('leaderboard_user_ids', $hide_leaderboard_users);
            return view('admin.leaderboard.user_list',compact('users','search_key','search_date'),['page_title'=>'User List']);
        }else{
            return view('admin.leaderboard.user_table',compact('users','search_key','search_date'));
        }

    }

    public function setSession(Request $request){
        $session_data = Session::get('leaderboard_user_ids');
        if($session_data){
            $user_ids = $session_data;
            if(in_array($request->value,$user_ids)){
                if(($key = array_search($request->value, $user_ids)) !== false) {
                    unset($user_ids[$key]);
                    array_values($user_ids);
                }
            }else{
                array_push($user_ids,$request->value);
            }
        }else{
            $user_ids = [];
            array_push($user_ids,$request->value);
        }
        Session::put('leaderboard_user_ids', $user_ids);

        return Session::get('leaderboard_user_ids');
    }

    public function hideUser(){
        $session_list = Session::get('leaderboard_user_ids');
        HideLeaderboardUser::truncate();

        foreach ($session_list as $session_data) {
            HideLeaderboardUser::create(['user_id'=>$session_data]);
        }
        Session::forget('leaderboard_user_ids');

        return redirect()->route('admin.leaderboard.index')->with('success','User Hide From Leaderboard Successfully!');
    }

}
