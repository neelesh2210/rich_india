<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawalRequest extends Model
{
    use HasFactory;

    protected $fillabel = [
        'user_id',
        'amount',
        'status'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
