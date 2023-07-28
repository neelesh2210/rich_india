<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'name',
        'image',
        'price',
        'discount',
        'discounted_price',
        'referral_commission',
        'referral_commission_type',
        'description',
        'seo_title',
        'seo_keyword',
        'seo_description',
        'status',
        'delete_status'
    ];
}
