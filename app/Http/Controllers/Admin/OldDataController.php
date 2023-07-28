<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Models\User;
use App\CPU\UserManager;
use App\Models\Admin\Plan;
use App\Models\PlanPurchase;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Admin\UserDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class OldDataController extends Controller
{

    public function getOldUsers(Request $request){
        session()->forget('user_ids');
        $search_key = $request->search_key;
        $search_date = $request->search_date;
        $old_users = UserManager::oldUserWithoutTrash()->with('sponsorDetail');
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
            $old_users=$old_users->whereBetween('created_at', [$startDate, $endDate]);
        }
        if($search_key)
        {
            $old_users=$old_users->where(function ($query) use ($search_key){
                $query->where('name','like','%'.$search_key.'%')
                      ->orWhere('email','like','%'.$search_key.'%')
                      ->orWhere('phone','like','%'.$search_key.'%');
            });
        }
        $old_users = $old_users->orderBy('created_at','desc')->paginate(15);

        return view('admin.old_user.index',compact('old_users','search_key','search_date'),['page_title'=>'Old Users']);
    }

    public function createOldUser(Request $request){
        $search_key = $request->search_key;
        $page = $request->page;
        if(!$page){
            $page = 1;
        }
        $old_users = UserManager::oldUserWithoutTrash()->where('referral_code',NULL);
        if($search_key){
            $old_users = $old_users->where(function ($query) use ($search_key){
                $query->where('name','like','%'.$search_key.'%')
                      ->orWhere('email','like','%'.$search_key.'%')
                      ->orWhere('referrer_code','like','%'.$search_key.'%');
            });

        }
        $old_users = $old_users->paginate(15, ['*'], 'page', $page);
        if($request->ajax()){
            return view('admin.old_user.table',compact('old_users','search_key'));
        }
        return view('admin.old_user.create',compact('old_users','search_key'),['page_title'=>'Add Old User']);
    }

    public function storeOldUser(Request $request){
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'state' => 'required',
            'referrer_code' => 'required|unique:users',
            'current_plan_id' => 'required',
        ]);
        if($request->referral_code){
            $this->validate($request, [
                'referral_code' => [Rule::exists('users','referrer_code')->where('delete_status','0'),]
            ]);
        }
        $input =  $request->all();
        $input['associates'] = Session::get('user_ids');

        $user = new User;
        $user->added_by = 'admin';
        $user->name = $request->name;
        $user->email = $request->email;
        $user->state = $request->state;
        $user->referrer_code = $request->referrer_code;
        $user->referral_code = $request->referral_code;
        $user->password = Hash::make($request->email);
        $user->is_old = '1';
        $user->save();

        $user_detail = new UserDetail;
        $user_detail->user_id = $user->id;
        $user_detail->current_plan_id = $request->current_plan_id;
        $user_detail->old_paid_payout = $request->old_paid_payout;
        $user_detail->old_not_paid_payout = $request->old_not_paid_payout;
        $user_detail->save();

        $plan_purchase = new PlanPurchase;
        $plan_purchase->user_id = $user->id;
        $plan_purchase->plan_id = $request->current_plan_id;
        $plan_purchase->course_ids = Plan::where('id',$request->current_plan_id)->first()->course_ids;
        $plan_purchase->payment_status = 'success';
        $plan_purchase->save();

        if(Session::get('user_ids')){
            foreach(Session::get('user_ids') as $user_id){
                User::where('id',$user_id)->update([
                    'referral_code'=>$request->referrer_code
                ]);
            }
        }

        session()->forget('user_ids');
        return redirect()->route('admin.get.old.users')->with('success','Old User Registered Successfully!');
    }

    public function editOldUser(Request $request,$user_id){
        $edit_old_user = User::where('id',$user_id)->first();

        $search_key = $request->search_key;
        $page = $request->page;
        if(!$page){
            $page = 1;
        }
        $old_users = UserManager::oldUserWithoutTrash()->where('referral_code',NULL);
        if($search_key){
            $old_users = $old_users->where(function ($query) use ($search_key){
                $query->where('name','like','%'.$search_key.'%')
                      ->orWhere('email','like','%'.$search_key.'%')
                      ->orWhere('referrer_code','like','%'.$search_key.'%');
            });

        }
        $old_users = $old_users->paginate(15, ['*'], 'page', $page);
        if($request->ajax()){
            return view('admin.old_user.table',compact('old_users','search_key'));
        }
        return view('admin.old_user.edit',compact('edit_old_user','old_users','search_key'),['page_title'=>'Edit Old User']);
    }

    public function updateOldUser(Request $request,$user_id){
        $this->validate($request, [
            'name' => 'required|max:255',
            'state' => 'required',
            'current_plan_id' => 'required',
        ]);
        if($request->referral_code){
            $this->validate($request, [
                'referral_code' => [Rule::exists('users','referrer_code')->where('delete_status','0'),]
            ]);
        }
        $input =  $request->all();
        $input['associates'] = Session::get('user_ids');

        $user = User::find($user_id);
        $user->name = $request->name;
        $user->state = $request->state;
        $user->referral_code = $request->referral_code;
        $user->save();

        $user_detail = UserDetail::where('user_id',$user_id)->first();
        if($user_detail->current_plan_id != $request->current_plan_id){
            $user_detail->current_plan_id = $request->current_plan_id;
        }
        $user_detail->old_paid_payout = $request->old_paid_payout;
        $user_detail->old_not_paid_payout = $request->old_not_paid_payout;
        $user_detail->save();

        if($user_detail->current_plan_id != $request->current_plan_id){
            $plan_purchase = new PlanPurchase;
            $plan_purchase->user_id = $user_id;
            $plan_purchase->plan_id = $request->current_plan_id;
            $plan_purchase->course_ids = Plan::where('id',$request->current_plan_id)->first()->course_ids;
            $plan_purchase->payment_status = 'success';
            $plan_purchase->save();
        }

        foreach(Session::get('user_ids') as $user_id){
            User::where('id',$user_id)->update([
                'referral_code'=>$request->referrer_code
            ]);
        }

        session()->forget('user_ids');
        return redirect()->route('admin.get.old.users')->with('success','Old User Registered Successfully!');
    }

    public function setSession(Request $request){
       $session_data = Session::get('user_ids');
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
        Session::put('user_ids', $user_ids);

        return Session::get('user_ids');
    }

}
