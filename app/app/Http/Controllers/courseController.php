<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Questions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class courseController extends Controller
{
    //Retuns all questions in one course
    public static function firstPage($course_pk){
        if(Session::get('google_token') == null){
            return redirect('/');
        }
        $course = Course::get($course_pk);
        $all_questions = Questions::get($course_pk);
        if(!$course){
            abort(404);
        }
        $course = $course[0];
        return view('course', ['course' => $course, 'all_questions' => $all_questions]);
    }
    //RETURNS ONE QUESTON IF THE $id equals a questions in a $course
    public static function oneQuestion($course, $id){
        if(Session::get('google_token') == null){
            return redirect('/');
        }
        $questions = Questions::get_one($course, $id);
        if($questions == null){
            abort(404);
        }
        return var_dump($questions);
    }
}
