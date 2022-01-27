<?php

use App\Http\Controllers\userController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [userController::class, 'login']);

Route::post('/register', [userController::class, 'register']);

Route::get('/confirmEmail/{token}', [userController::class, 'confirmEmail']);

Route::get('/resetPassword/{token}', [userController::class, 'resetPassword']);

