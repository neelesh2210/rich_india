<?php

namespace App\Models;

use App\Models\Admin\Plan;
use App\Models\Commission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PlanPurchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'plan_id',
        'course_ids',
        'amount',
        'discounted_amount',
        'coupon_detail',
        'coupon_discount_amount',
        'total_amount',
        'payment_detail',
        'payment_status',
        'delete_status'
    ];

    protected $casts = [
        'course_ids' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id')->where('delete_status','0');
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class,'plan_id','id');
    }

    public function commission(){
        return $this->hasMany(Commission::class,'plan_purchase_id')->where('user_id','!=',1);
    }
}
