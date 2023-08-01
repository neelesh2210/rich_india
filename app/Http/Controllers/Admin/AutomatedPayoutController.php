<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Models\User;
use App\CPU\UserManager;
use App\Models\BankDetail;
use App\Models\Admin\Payout;
use Illuminate\Http\Request;
use App\Models\Admin\FaildPayout;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class AutomatedPayoutController extends Controller
{

    public function automatedPayout(){

        $users =  User::select('users.*', 'commission_sum_commission', DB::raw('IFNULL(payout_sum_amount, 0) as payout_sum_amount'), DB::raw('(commission_sum_commission - IFNULL(payout_sum_amount, 0)) AS balance'))
        ->join(DB::raw('(SELECT user_id, SUM(commission) AS commission_sum_commission FROM commissions WHERE commission > 0 AND delete_status = \'0\' GROUP BY user_id) AS commissions'), 'users.id', '=', 'commissions.user_id')
        ->leftJoin(DB::raw('(SELECT user_id, SUM(amount) AS payout_sum_amount FROM payouts GROUP BY user_id) AS payouts'), 'users.id', '=', 'payouts.user_id')
        ->where('users.delete_status', '0')
        ->whereHas('bankDetail')
        ->with('bankDetail')
        ->orderBy('users.created_at','desc')
        ->having('balance', '>', 0)->take(100)->get();


        foreach($users as $user){
            if($user->balance > 0){
                if(optional($user->bankDetail)->upi_id){
                    $data = razorpay_payout_upi($user, $user->balance);

                    $payout_details=$data;
                    $response=json_decode($payout_details);
                    if($response->error->code != 'BAD_REQUEST_ERROR'){
                        $payout = new Payout;
                        $payout->user_id = $user->id;
                        $payout->amount = $user->balance;
                        $payout->payment_type = 'online';
                        $payout->payment_status = 'success';
                        $payout->payment_detail = $payout_details;
                        $payout->save();
                        try {
                            Mail::send('email.payout', ['user_name'=>$user->name,'amount'=>$user->balance], function($message) use($user){
                                $message->to($user->email);
                                $message->subject('RichIND Notification');
                            });
                        } catch (\Throwable $th) {

                        }
                    }else{
                        FaildPayout::create([
                            'user_id'=>$user->id,
                            'amount'=>$user->balance,
                            'payment_type'=>'online',
                            'payment_detail'=>json_encode($response->error),
                        ]);
                    }
                }elseif(optional($user->bankDetail)->account_number){
                    $data = razorpay_payout_bank($user, $user->balance);

                    $payout_details=$data;
                    $response=json_decode($payout_details);
                    if($response->error->code != 'BAD_REQUEST_ERROR'){
                        $payout = new Payout;
                        $payout->user_id = $user->id;
                        $payout->amount = $user->balance;
                        $payout->payment_type = 'online';
                        $payout->payment_status = 'success';
                        $payout->payment_detail = $payout_details;
                        $payout->save();
                        try {
                            Mail::send('email.payout', ['user_name'=>$user->name,'amount'=>$user->balance], function($message) use($user){
                                $message->to($user->email);
                                $message->subject('RichIND Notification');
                            });
                        } catch (\Throwable $th) {

                        }
                    }else{
                        FaildPayout::create([
                            'user_id'=>$user->id,
                            'amount'=>$user->balance,
                            'payment_type'=>'online',
                            'payment_detail'=>json_encode($response->error),
                        ]);
                    }
                }else{
                    FaildPayout::create([
                        'user_id'=>$user->id,
                        'amount'=>$user->balance,
                        'payment_type'=>'online',
                        'payment_detail'=>'Use Have no Account Details',
                    ]);
                }
            }
        }

        return back()->with('success','Payout Released Successfully!');
    }

}
