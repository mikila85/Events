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

Route::get('/', 'HomeController@index');

Route::get('/google', 'BaseController@index');

Route::get('test', 'HomeController@test');

Route::get('test1', 'HomeController@test1');


Route::get('pay', 'PaypaltestController@pay');

Route::resource('event', 'EventController');
Route::get('place/autocomplete', 'PlaceController@autocomplete');
Route::resource('place', 'PlaceController');


//upload
Route::get('upload/image', 'UploadController@image');
