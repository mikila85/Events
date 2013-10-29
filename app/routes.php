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

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('test', 'HomeController@test');

Route::get('test1', 'HomeController@test1');

Route::get('users/logcheck', 'UsersController@logcheck');
Route::get('users/logout', 'UsersController@logout');
Route::get('users/login', 'UsersController@login');
Route::post('users/login', 'UsersController@loginAuth');
Route::resource('users', 'UsersController');
