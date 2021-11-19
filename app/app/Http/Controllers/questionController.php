<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\Models\Questions;
use App\Mail\sendNotification;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;


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
        return json_encode($answers);
    }
    public static function uploadAnswer($parentId){

        $data = [
            'post_fk' =>filter_var(request::post('post_fk'), FILTER_SANITIZE_SPECIAL_CHARS),
            'user_fk' => filter_var(request::post('user_fk'), FILTER_SANITIZE_SPECIAL_CHARS),
            'post_text' => request::post('post_text')
        ];

        $send_email_to = Questions::get_one($data['post_fk'])[0]->user_fk;
        if(Session::get('email') != $send_email_to){
            $details = [
                'title' => "Någon har besvarat din fråga/svar!!!",
                'responder' => Session::get('name')
            ];
    
            Mail::to($send_email_to)->send(new sendNotification($details));
    
        }
        Questions::upload_answers((object)$data);

        $answers = Questions::get_answers($parentId);

        return json_encode($answers);
    }
    public static function likeAnswer($id){
        return Questions::like($id);
    }

    public static function delete(){
        $post_pk = request::post('id');

        
        $question = Questions::get_one($post_pk);
        
        if(Session::get('email') == $question[0]->user_fk){
            return Questions::delete($post_pk);
        }else{
            return false;
        }
    }
}
