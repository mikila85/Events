<?php
/**
 * Created by PhpStorm.
 * User: romanraslin
 * Date: 09/11/2013
 * Time: 12:58
 */

class Places {
    public static function getEventIDByAddress($address){
        if($data = DB::table('places')->where('street', '=', $address)->first()){
            return $data->ID;
        } else {
            $id = DB::table('places')->insertGetId(
                array('street' => $address)
            );
            return $id;
        }
    }
}