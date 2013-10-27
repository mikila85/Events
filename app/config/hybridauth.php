<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mike
 * Date: 10/26/13
 * Time: 1:04 PM
 * To change this template use File | Settings | File Templates.
 */

return array(
    "base_url"   => "http://localhost/social/auth",
    "providers"  => array (
        "Google"     => array (
            "enabled"    => true,
            "keys"       => array ( "id" => "459365692761-keq8ieu02s68oe15aun4jb0ql8hm4ctr.apps.googleusercontent.com", "secret" => "H6XvsujNjYoMtZGkPZQ7fl0n" ),
        ),
        "Facebook"   => array (
            "enabled"    => true,
            "keys"       => array ( "id" => "229278003904952", "secret" => "db166baff3e7fef8dc707d0fc1151976" ),
            "display" => "popup"
        )
    ),
);
