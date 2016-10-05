<?php
/**
 * Created by PhpStorm.
 * User: ivan.li
 * Date: 10/5/2016
 * Time: 4:27 PM
 */
return array(

    'auth' => array(

        'username' => env("ATLASSIAN_USERNAME"),

        'password' => env("ATLASSIAN_PASSWORD"),

        'domain' => env("ATLASSIAN_DOMAIN"),

        'method' => 'basic'
        /*alternatives - OAUTH, COOKIE*/

    ),

    'cache' => array(

        'enable' => true,

    ),


    'connection' => array(

        'driver' => 'curl',

    ),
);