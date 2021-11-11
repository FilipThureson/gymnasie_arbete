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
        

        return view('your_q');
    }

    public static function yourQuestions_ajax($id){
        $questions = Questions::get_your($id);
        return json_encode($questions);
    }

    public static function getOne($id){
        $question = Questions::get_one($id);
        
        return json_encode($question);
    }
    public static function getAnswers($parentId){
        $answers = Questions::get_answers($parentId);
        
        return print_r($answers);
    }
}
