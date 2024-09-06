<?php

namespace App\Models\Admin;

use App\Models\Language;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function topic(){
        return $this->hasMany(Topic::class);
    }
}
