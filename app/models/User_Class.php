<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mike
 * Date: 10/26/13
 * Time: 12:26 PM
 * To change this template use File | Settings | File Templates.
 */
class User_Class{
    private $id;
    private $email;
    private $groups;
    public static $currentUser;

    public function __construct(array $data){
        foreach ($data as $key => $value){
            $this->$key = $value;
        }
    }

//    public function toArray(){
//        foreach($this as $key => $value) {
//            print "$key => $value\n";
//        }
//    }

    function isInGroups($groups){

    }

    function Auth() {
        if(!self::$currentUser){
//            $cokie..
//            $data = DB::select from users where $_COOKIE
//            self::$currentUser = new User($data);
        }
        return self::$currentUser;
    }
}