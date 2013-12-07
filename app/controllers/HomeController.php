<?php

class HomeController extends BaseController {
	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
        $layout =  View::make('layouts.main');

        $layout->nest('content', 'home.index', array(
            'slider' => View::make('home.slider'),
            'sideMenu' => View::make('home.sideMenu'),
            'mainContent' => View::make('home.mainContent')
        ));
        return $layout;
	}



}