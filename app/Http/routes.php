<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('/', function () {
        return view('pages.index');
    });

    Route::get('about', function () {
        return view('pages.about');
    });

    Route::get('list', function () {
        return view('pages.list');
    });

    Route::get('item', function () {
        return view('pages.item');
    });

    Route::get('write', function () {
        return view('pages.write');
    });

    Route::get('auth/github', 'Auth\AuthController@redirectToProvider');
    Route::get('auth/github/callback', 'Auth\AuthController@handleProviderCallback');
    Route::get('auth/login', function () {
        return view('pages.login');
    });
    Route::get('auth/logout', function () {
        \Auth::logout();
        return redirect('auth/login');
    });

});
