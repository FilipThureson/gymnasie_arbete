    <?php

use App\Http\Controllers\courseController;
use App\Http\Controllers\homeController;
use Illuminate\Support\Facades\Route;
    use Laravel\Socialite\Facades\Socialite;

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

Route::get('/login', function (){
    return "loginplease" . "<a href='/auth/redirect'>Login!</a>";
});

Route::get('/{course}', [courseController::class, 'firstPage']);

Route::get('/{course}/{id}', [courseController::class, 'oneQuestion'])->where('id', '[0-9]+');

Route::get('/auth/redirect', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/auth/callback', function () {
    $user = Socialite::driver('google')->user();
    return print_r($user);
});
