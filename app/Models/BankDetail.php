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
        'aadhar_name',
        'aadhar_number',
        'pan_name',
        'pan_number',
        'aadhar_front_image',
        'aadhar_back_image',
        'pan_image',
        'note',
        'admin_message',
    ];
}
