<?php

namespace App\Console\Commands;

use Log;
use App\CPU\UserManager;
use App\Models\BankDetail;
use App\Models\Admin\Payout;
use Illuminate\Console\Command;
use App\Models\Admin\FaildPayout;

class AutomatedPayoutCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'automated_payout:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Log::info("Cron is working fine!");

        $users = UserManager::withoutTrash()->with('bankDetail')->withSum('commission','commission')->withSum('payout','amount')->get();
        foreach($users as $user){
            $user->bankDetail = BankDetail::where('user_id',$user->id)->first();
            $user->remaining_amount = $user->commission_sum_commission - $user->payout_sum_amount;
            if($user->remaining_amount != 0){
                if(optional($user->bankDetail)->upi_id){
                    $data = razorpay_payout_upi($user, $user->remaining_amount);
                }elseif(optional($user->bankDetail)->account_number){
                    $data = razorpay_payout_bank($user, $user->remaining_amount);
                }else{
                    FaildPayout::create([
                        'user_id'=>$user->id,
                        'amount'=>$user->remaining_amount,
                        'payment_type'=>'online',
                        'payment_detail'=>'Use Have no Account Details',
                    ]);
                    continue;
                    return 1;
                    //return back()->with('error','Use Have no Account Details.');
                }

                $payout_details=$data;
                $response=json_decode($payout_details);
            if($response->error->code != 'BAD_REQUEST_ERROR'){
                    $payout = new Payout;
                    $payout->user_id = $user->id;
                    $payout->amount = $user->remaining_amount;
                    $payout->payment_type = 'online';
                    $payout->payment_status = 'success';
                    $payout->payment_detail = $payout_details;
                    $payout->save();

                    try {
                        Mail::send('email.payout', ['user_name'=>$user->name,'amount'=>$user->remaining_amount], function($message) use($user){
                            $message->to($user->email);
                            $message->subject('The Success Preneur Notification');
                        });
                    } catch (\Throwable $th) {
                        //throw $th;
                    }
                }else{
                    FaildPayout::create([
                        'user_id'=>$user->id,
                        'amount'=>$user->remaining_amount,
                        'payment_type'=>'online',
                        'payment_detail'=>json_encode($response->error),
                    ]);
                    //return back()->with('error','Incorrent Bank Detail...');
                }
            }
        }
    }
}
