<?php

namespace Waavi\UrlShortener\Drivers;

use Mremi\UrlShortener\Provider\Bitly\BitlyProvider;
use Mremi\UrlShortener\Provider\Bitly\GenericAccessTokenAuthenticator;
use Mremi\UrlShortener\Provider\Bitly\OAuthClient;

class BitlyGenericAccessToken extends BaseDriver
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
    public function __construct($accessToken, $connectTimeout, $timeout)
    {
        $this->provider = new BitlyProvider(new GenericAccessTokenAuthenticator($accessToken), ['connect_timeout' => $connectTimeout, 'timeout' => $timeout]);
    }
}
