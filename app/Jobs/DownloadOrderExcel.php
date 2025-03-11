<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use App\Exports\PaymentTransactionsExport;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class DownloadOrderExcel implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $plan_purchases;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($plan_purchases) {
        $this->plan_purchases = $plan_purchases;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        return Excel::store(new PaymentTransactionsExport($this->plan_purchases), 'orders.xlsx', 'public');
    }
}
