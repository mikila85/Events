<?php
/**
 * Created by PhpStorm.
 * User: romanraslin
 * Date: 1/4/14
 * Time: 11:21 AM
 */

class UploadController extends BaseController {
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

    public function image()
    {
        $file = Input::file('logoLink');

        $destinationPath = public_path().'/img/';
        $filename = $file->getClientOriginalName();
        $upload_success = Input::file('file')->move($destinationPath, $filename);

        if( $upload_success ) {
            return Response::json('success', 200);
        } else {
            return Response::json('error', 400);
        }
    }



}