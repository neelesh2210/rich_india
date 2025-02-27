<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'current_plan_id',
        'total_commission',
        'old_paid_payout',
        'old_not_paid_payout',
        'total_wallet_balance'
    ];

    public function plan()
    {
        return $this->belongsTo(Plan::class,'current_plan_id','id');
    }

    public function user(){
        return $this->belongsTo(User::Class);
    }

    public function lastPayout(){
        return $this->hasOne(Payout::class,'user_id','user_id')->orderBy('id','desc');
    }

    public function lastCommission(){
        return $this->hasOne(Commission::class,'user_id','user_id')->orderBy('id','desc');
    }
}
