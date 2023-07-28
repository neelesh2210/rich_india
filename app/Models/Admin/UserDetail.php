<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'current_plan_id',
        'total_commission',
        'old_paid_payout',
        'old_not_paid_payout'
    ];

    public function plan()
    {
        return $this->belongsTo(Plan::class,'current_plan_id','id');
    }
}
