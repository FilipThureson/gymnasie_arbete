<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class courseController extends Controller
{
    public static function firstPage($course_pk){
        if(Session::get('google_token') == null){
            return redirect('/');
        }
        $course = Course::get($course_pk);

        if(!$course){
            abort(404);
        }
        $course = $course[0];
        return $course->course_pk;

    }

    public static function oneQuestion($course, $id){
        if(Session::get('google_token') == null){
            return redirect('/');
        }
        return"<h1>Returning View For Question: {$id} in Course: {$course}</h1>";
    }
}
