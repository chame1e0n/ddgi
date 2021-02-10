<?php
/*
 * Using basic auth to connect to the site and get information from it
 */

return [
    'url' =>  env('FROM_SITE_URL'),
    'username' => env('FROM_SITE_USERNAME'),
    'password' => env('FROM_SITE_PASSWORD')
];