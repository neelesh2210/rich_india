<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'priority',
        'slug',
        'title',
        'amount',
        'discounted_price',
        'points',
        'image',
        'course_ids',
        'commission',
        'upgrade_amount',
        'upgrade_commission',
        'description',
        'seo_title',
        'seo_keyword',
        'seo_description',
        'status',
        'delete_status',
    ];

    protected $casts = [
        'points' => 'array',
        'course_ids' => 'array',
        'commission' => 'array',
        'upgrade_amount' => 'array',
        'upgrade_commission' => 'array'
    ];
}
