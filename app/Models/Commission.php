<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'plan_purchase_id',
        'commission',
        'level',
        'delete_status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id')->where('delete_status','0');
    }

    public function purchasePlan()
    {
        return $this->belongsTo(PlanPurchase::class,'plan_purchase_id','id')->where('delete_status','0');
    }

}
