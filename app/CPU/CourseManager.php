<?php

namespace App\CPU;

use App\Models\Admin\Course;
use Illuminate\Support\Str;

class CourseManager
{

    public static function withoutTrash()
    {
        return Course::where('delete_status','0');
    }

}
