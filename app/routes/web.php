<?php

use App\Http\Controllers\courseController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\questionController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */

Route::get('/', [homeController::class, 'home']);

Route::get('/login', [userController::class, 'page']);

Route::get('/register', [userController::class, 'registerPage']);

Route::get('/logout', function(){
   \Illuminate\Support\Facades\Session::flush();
   return redirect('/');
});

Route::get('/{course}', [courseController::class, 'firstPage'])->where('course', '[A-z]+');

Route::post('/{course}/upload', [courseController::class, 'upload']);

Route::post('/{course}/getAll', [courseController::class, 'ajax_getAll']);

Route::post('/questions/{id}/getOne', [questionController::class,'getOne']);

Route::get('/questions/{id}', [courseController::class, 'oneQuestion'])->where('id', '[0-9]+');

Route::get('/questions/user/{id}', [questionController::class, 'yourQuestions']);

Route::post('/getyour/{id}', [questionController::class, 'yourQuestions_ajax']);

Route::post('/questions/{parentid}/ajax' , [questionController::class, 'getAnswers']);

Route::post('/questions/{parentid}/upload' , [questionController::class, 'uploadAnswer']);

Route::post('/questions/like/{id}', [questionController::class, 'likeAnswer']);

Route::post('/questions/delete', [questionController::class, 'delete']);

Route::post('/questions/answerUpdate', [questionController::class, 'answerUpdate']);


//LOGIN ROUTES

//Route::get('/auth/redirect', [loginController::class, 'redirect']);

//Route::get('/auth/callback', [loginController::class, 'login']);
