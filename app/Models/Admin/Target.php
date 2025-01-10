<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Target extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'slug',
        'name',
        'image',
        'start_date',
        'end_date',
        'amount',
        'description_one',
        'description_two',
        'description_three',
        'no_of_referral',
        'is_active',
    ];
}
