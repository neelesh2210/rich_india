<?php

namespace App\Exports;

use App\Models\PlanPurchase;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class PaymentTransactionsExport implements FromView
{
    public function __construct($plans){
        $this->plans=$plans;
    }

    public function view():View
    {
        return view('admin.payment_transaction.export',['plans'=>$this->plans]);
    }
}
