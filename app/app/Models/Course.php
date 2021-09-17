<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Course
{
    public static function get($course_pk){
        return DB::select("select * from courses WHERE course_pk = '{$course_pk}'");
    }
    public static function get_all(){
        return DB::select('select * from courses');
    }
}
