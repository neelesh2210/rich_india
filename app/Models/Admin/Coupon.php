<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'plan_ids',
        'start',
        'end',
        'amount',
        'type',
        'is_active',
        'is_delete',
    ];

    protected $casts = [
        'plan_ids' => 'array'
    ];
}
