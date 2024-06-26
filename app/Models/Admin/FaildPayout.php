<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FaildPayout extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'payment_type',
        'payment_detail'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id')->where('delete_status','0');
    }
}
