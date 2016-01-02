<?php

namespace Waavi\UrlShortener\Drivers;

use Mremi\UrlShortener\Provider\Google\GoogleProvider;

class Google extends BaseDriver
{
    /**
     *  Google Provider
     *
     *  @var Mremi\UrlShortener\Provider\Google\GoogleProvider
     */
    protected $provider;

    /**
     *  Create a new Google URL Shortener instance
     *
     *  @param  string  $apikey
     *  @param  integer $connectTimeout
     *  @param  integer $timeout
     *  @return void
     */
    public function __construct($apikey, $connectTimeout, $timeout)
    {
        $this->provider = new GoogleProvider($apikey, ['connect_timeout' => $connectTimeout, 'timeout' => $timeout]);
    }
}
