<?php

namespace Waavi\UrlShortener\Drivers;

use Mremi\UrlShortener\Provider\Bitly\BitlyProvider;
use Mremi\UrlShortener\Provider\Bitly\OAuthClient;
use Mremi\UrlShortener\Provider\Bitly\GenericAccessTokenAuthenticator;

class Bitly extends BaseDriver
{
    /**
     *  Bitly Provider
     *  @var Mremi\UrlShortener\Provider\Bitly\BitlyProvider
     */
    protected $provider;

    /**
     *  Create a new Bitly URL Shortener instance
     *
     *  @param  string  $username Username or generic access token
     *  @param  string  $password
     *  @param  integer $connectTimeout
     *  @param  integer $timeout
     *  @return void
     */
    public function __construct($username, $password, $connectTimeout, $timeout)
    {
        $authClient = $password ? new OAuthClient($username, $password) : new GenericAccessTokenAuthenticator($username);
        $this->provider = new BitlyProvider($authClient, ['connect_timeout' => $connectTimeout, 'timeout' => $timeout]);
    }
}
