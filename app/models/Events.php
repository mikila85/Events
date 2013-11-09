<?php
/**
 * Created by PhpStorm.
 * User: romanraslin
 * Date: 09/11/2013
 * Time: 13:11
 */

class Events {

    public static function create(array $data){

        $id = DB::table('events')->insertGetId(
            array('name' => $data['name'], 'user_ID' => Auth::user()->id)
        );

        if($id)
            return $id;
        return false;
    }


}