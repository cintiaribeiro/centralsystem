<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a php artisan route:cleargroup which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function(){
    Auth::routes(['register' => false]);
    Route::group([
        'namespace' => 'Admin',
        'middleware' => 'auth',
    ], function () {
        Route::resource('user', 'UserController');
    });
});

Route::get('/home', 'HomeController@index')->name('home');
