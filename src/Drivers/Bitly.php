<?php

namespace Waavi\UrlShortener\Drivers;

use Mremi\UrlShortener\Provider\Bitly\BitlyProvider;
use Mremi\UrlShortener\Provider\Bitly\OAuthClient;

class Bitly extends BaseDriver
{
    /**
     *  Bitly Provider
     *
     *  @var Mremi\UrlShortener\Provider\Bitly\BitlyProvider
     */
    protected $provider;

    /**
     *  Create a new Bitly URL Shortener instance
     *
     *  @param  string  $username
     *  @param  string  $password
     *  @param  integer $connectTimeout
     *  @param  integer $timeout
     *  @return void
     */
    public function __construct($username, $password, $connectTimeout, $timeout)
    {
        $this->provider = new BitlyProvider(new OAuthClient($username, $password), ['connect_timeout' => $connectTimeout, 'timeout' => $timeout]);
    }
}
