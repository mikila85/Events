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



Route::get('social/{action?}', array("as" => "hybridauth", function($action = "")
{
    // check URL segment
    if ($action == "auth") {
        // process authentication
        try {
            Hybrid_Endpoint::process();
        }
        catch (Exception $e) {
            // redirect back to http://URL/social/
           return Redirect::route('hybridauth');
        }
        return;
    }
    try {
        // create a HybridAuth object
        $socialAuth = new Hybrid_Auth(app_path() . '/config/hybridauth.php');
        // authenticate with Google
        //$provider = $socialAuth->authenticate("google");
        $provider = $socialAuth->authenticate("facebook");
        // fetch user profile
        $userProfile = $provider->getUserProfile();
    }
    catch(Exception $e) {
        // exception codes can be found on HybBridAuth's web site
        //return $e->getMessage();
    }
    // access user profile data


    // logout
    $provider->logout();

    $user_id = User::where('email', '=', $userProfile->email)->first();

    Auth::loginUsingId($user_id->id);

    //return Redirect::route('users/logcheck');
}));