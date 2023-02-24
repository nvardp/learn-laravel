<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\ProductController;
use App\http\Controllers\ProductImageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('email-test', function(){
    $email_data = array(
        'name' =>"banana...",
        'email' => "nvardp21@gmail.com",
    );

    dispatch(new App\Jobs\SendEmailJob($email_data));
    dd('done');
});



Route::resource('products', ProductController::class)->middleware(['auth']);
Route::resource('users', UserController::class)->middleware(['auth']);
Route::resource('roles', RoleController::class)->middleware(['auth']);
Route::post('products_img/{productImage}', ProductImageController::class .'@destroy')->name('productimage.destroy');

Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    /** * Home Routes  */
    Route::get('/', 'HomeController@index')->name('home.index');

    Route::group(['middleware' => ['guest']], function() {
        /** * Register Routes */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**  * Login Routes */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
    });
});
