<?php

namespace App\Models;

use App\Models\Admin\Plan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UpgradePlanRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'request_user_id',
        'plan_id',
        'status',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function plan(){
        return $this->belongsTo(Plan::class);
    }
}
