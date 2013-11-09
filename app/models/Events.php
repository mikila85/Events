<?php
/**
 * Created by PhpStorm.
 * User: romanraslin
 * Date: 09/11/2013
 * Time: 13:11
 */

class Events {

    /**
     * Creates event by data, authentication needed, been checked in the controller.
     * @param array $data
     * @return bool or event id if succed
     */
    public static function create(array $data){

        $id = DB::table('events')->insertGetId(
            array('name' => $data['name'], 'user_ID' => Auth::user()->id)
        );

        if($id)
            return $id;
        return false;
    }


}