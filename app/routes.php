<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*
Registration
*/
Route::get('/', [
    'as'   => 'home',
    'uses' => 'PagesController@home'
]);

Route::get('register', [
    'as'   => 'register_path',
    'uses' => 'RegistrationController@create'
]);

Route::post('register', [
    'as'   => 'register_path',
    'uses' => 'RegistrationController@store'
]);

/**
 *  Sessions
 */
Route::get('login', [
    'as'   => 'login_path',
    'uses' => 'SessionsController@create'
]);

Route::post('login', [
    'as'   => 'login_path',
    'uses' => 'SessionsController@store'
]);
