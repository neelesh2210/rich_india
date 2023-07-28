<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payout extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'payment_type',
        'payment_detail',
        'remark',
        'payment_status',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id')->where('delete_status','0');
    }
}
