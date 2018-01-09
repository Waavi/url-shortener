<?php

return [
    'driver'          => 'google',
    'google'          => [
        'apikey' => env('URL_SHORTENER_GOOGLE_API_KEY', ''),
    ],
    'bitly'           => [
        'username' => env('URL_SHORTENER_BITLY_USERNAME', ''),
        'password' => env('URL_SHORTENER_BITLY_PASSWORD', ''),
    ],
    'bitly-gat'       => [
        'genericAccessToken' => env('URL_SHORTENER_BITLY_GENERIC_ACCESS_TOKEN', ''),
    ],
    'connect_timeout' => 2,
    'timeout'         => 2,
];
