<?php
/**
 * Created by PhpStorm.
 * User: romanraslin
 * Date: 09/11/2013
 * Time: 12:58
 */

class Places {

    /**
     * Returns event ID by string (full address), will create place if not exists and return its ID
     * @param string $address
     * @return int - address ID
     */
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