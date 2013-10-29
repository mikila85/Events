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
        return DB::table('users')->insertGetId($user);
    }

    public static function isEmailExists($email){
        return DB::table('users')->where('email', '=', $email)->count();
    }
}