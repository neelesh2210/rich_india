<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'holder_name',
        'ifsc_code',
        'account_number',
        'bank_name',
        'upi_id',
    ];
}
