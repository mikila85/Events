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
        if($data = DB::table('places')->where('full_address', '=', $address)->first()){
            return $data->ID;
        } else {
            $id = DB::table('places')->insertGetId(
                array(
                    'full_address' => $address,
                    //'street' => $address['street'],
                    //'number'=> $address['house_num'],
                    //'city'=> $address['city'],
                    //'country'=> $address['country']
                )
            );
            return $id;
        }
    }
}