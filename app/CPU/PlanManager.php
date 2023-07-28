<?php

namespace App\CPU;

use App\Models\Admin\Plan;
use Illuminate\Support\Str;

class PlanManager
{

    public static function withoutTrash()
    {
        return Plan::where('delete_status','0');
    }

}
