<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questions;
use Illuminate\Support\Facades\Session;

class questionController extends Controller
{
    public static function yourQuestions($id){
        if(Session::get('google_token') == null){
            return redirect('/');
        }
        if($id != Session::get('email')){
            abort(403);
        }
        $questions = Questions::get_your($id);
        $course = [
            "course_pk" => "Dina Frågor"
        ];

        return view('your_q', ['course' => (object) $course, 'all_questions' => $questions]);
    }
}
