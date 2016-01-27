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

    Route::get('qs/write', 'QController@get_write');
    Route::post('qs/write', 'QController@post_write');
    Route::get('qs/{q_id}/edit', 'QController@get_edit');
    Route::put('qs/{q_id}/edit', 'QController@put_edit');
    Route::delete('qs/{q_id}/delete', 'QController@delete_item');
    Route::get('qs', 'QController@get_list');
    Route::get('qs/{q_id}', 'QController@get_item');

    Route::post('as/write', 'AController@post_write');
    Route::get('as/{a_id}/edit', 'AController@get_edit');
    Route::put('as/{a_id}/edit', 'AController@put_edit');
    Route::delete('as/{a_id}/delete', 'AController@delete_item');

    Route::post('comments/write', 'CommentController@post_write');
    Route::get('comments/{c_id}/edit', 'CommentController@get_edit');
    Route::put('comments/{c_id}/edit', 'CommentController@put_edit');
    Route::delete('comments/{c_id}/delete', 'CommentController@delete_item');

    Route::get('auth/github', 'Auth\AuthController@redirectToProvider');
    Route::get('auth/github/callback', 'Auth\AuthController@handleProviderCallback');
    Route::get('auth/login', 'Auth\AuthController@login');
    Route::post('auth/logout', 'Auth\AuthController@logout');

});
