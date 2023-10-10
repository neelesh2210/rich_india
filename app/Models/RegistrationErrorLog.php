<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationErrorLog extends Model
{
    use HasFactory;

    protected $fillabel = [
        'from',
        'name',
        'email',
        'phone',
        'state',
        'plan',
        'referral_code',
        'payment_image',
        'payment_id',
        'password',
        'error',
    ];
}
