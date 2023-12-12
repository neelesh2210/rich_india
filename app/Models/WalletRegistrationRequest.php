<?php

namespace App\Models;

use App\Models\Admin\Plan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WalletRegistrationRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'state',
        'plan',
        'referrer_code',
        'referral_code',
        'password',
        'status',
    ];

    public function planDetail(){
        return $this->belongsTo(Plan::class,'plan','id');
    }
}
