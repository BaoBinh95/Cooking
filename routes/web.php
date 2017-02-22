<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::group(['prefix' => 'user', 'middleware' => 'auth'], function() {
    Route::resource('/profiles', 'User\UserController');
    Route::get('/profiles/getChangePassword/{id}', [
        'as' => 'user.profiles.getChangePassword',
        'uses' => 'User\UserController@getChangePassword'
    ]);
    Route::post('/profiles/postChangePassword/{id}', [
        'as' => 'user.profiles.postChangePassword',
        'uses' => 'User\UserController@postChangePassword'
    ]);
});

