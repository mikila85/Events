<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mike
 * Date: 10/29/13
 * Time: 6:40 PM
 * To change this template use File | Settings | File Templates.
 */

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
            return Redirect::to('users/login');
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
        return Redirect::to('users/login');
    }
    // access user profile data


    // logout
    $provider->logout();
//    echo "<pre>";
//    var_dump($userProfile);
//    return;
    $user_data = User::where('email', '=', $userProfile->email)->first();
    if($user_data){
        Auth::loginUsingId($user_data->id, true);
    } else{
        $user_data = array();
        $user_data["email"] = $userProfile->email;
        $user_data["fb_id"] = $userProfile->identifier;
        $user_data["firstname"] = $userProfile->firstName;
        $user_data["lastname"] = $userProfile->lastName;
        $user_id = Users::addUser($user_data);
        Auth::loginUsingId($user_id, true);
    }


    return Redirect::to('users/logcheck');
}));