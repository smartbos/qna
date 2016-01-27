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

    Route::get('qna/write', 'QnaController@get_write');
    Route::post('qna/write', 'QnaController@post_write');
    Route::get('qna/{q_id}/edit', 'QnaController@get_edit');
    Route::put('qna/{q_id}', 'QnaController@put_edit');
    Route::delete('qna/{q_id}', 'QnaController@delete_item');
    Route::get('qna', 'QnaController@get_list');
    Route::get('qna/{q_id}', 'QnaController@get_item');

    Route::get('auth/github', 'Auth\AuthController@redirectToProvider');
    Route::get('auth/github/callback', 'Auth\AuthController@handleProviderCallback');
    Route::get('auth/login', 'Auth\AuthController@login');
    Route::post('auth/logout', 'Auth\AuthController@logout');

});
