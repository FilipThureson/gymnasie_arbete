<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Course;
use App\Models\Questions;

class courseController extends Controller
{
    //Retuns all questions in one course
    public static function firstPage($course_pk){
        if(Session::get('google_token') == null){
            return redirect('/');
        }
        $course = Course::get($course_pk);
        if(!$course){
            abort(404);
        }
        $course = $course[0];
        return view('course', ['course' => $course]);
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

    public static function ajax_getAll($course_pk){
        $all_questions = Questions::get($course_pk);
        
        return json_encode($all_questions);
    }
    
    public static function upload($course_pk){
        $data = [
            'course' => $course_pk,
            'user_fk' => request::post('user_fk'),
            'title' => request::post('title'),
            'q_text' => request::post('q_text')
        ];
        $test = Questions::upload((object)$data);
        return $test;
    }
    
}
