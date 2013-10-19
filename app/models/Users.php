<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mike
 * Date: 10/18/13
 * Time: 11:07 PM
 * To change this template use File | Settings | File Templates.
 */

class Users {

    /**
     * @param array $user - User array.
     */
    public static function addUser(array $user){
        DB::insert('insert into users (email, firstname) values (:email, :firstname)',
            array('email'=>'users@gaasdsdfsf.xzc', 'firstname'=>'first'));
        echo "OK";
    }

}