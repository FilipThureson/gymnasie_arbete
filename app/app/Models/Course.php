<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Course
{
    public static function get($course_pk){
        return DB::table('courses')->where('course_fk' , $course_pk)->get();
    }
    public static function get_all(){
        $courses =  DB::select('select * from courses');
        $quotes = [];
        foreach($courses as $course){
            $quotes[$course->course_pk] = DB::table('quotes')->where('course_fk', $course->course_pk)->inRandomOrder()->first();
        }
        return ["courses" => $courses, "quotes" => $quotes];
    }
}
