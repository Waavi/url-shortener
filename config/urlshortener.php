<?php

return [
    'driver'          => 'google',
    'google'          => [
        'apikey' => env('URL_SHORTENER_GOOGLE_API_KEY', ''),
    ],
    'bitly'           => [
        'username' => env('URL_SHORTENER_BITLY_USERNAME', ''), // Or generic access token
        'password' => env('URL_SHORTENER_BITLY_PASSWORD', ''), // Leave blank if generic access token is to be used
    ],
    'connect_timeout' => 2,
    'timeout'         => 2,
];
