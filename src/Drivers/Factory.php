<?php

namespace Waavi\UrlShortener\Drivers;

use Illuminate\Config\Repository as Config;
use InvalidArgumentException;

class Factory
{
    /**
     *  Google driver
     *
     *  @var Google
     */
    protected $google;

    /**
     *  Bitly driver
     *
     *  @var bitly
     */
    protected $bitly;

    /**
     * Bitly Generic Access Token Driver
     *
     * @var BitlyGenericAccessToken
     */
    protected $bitlyGAT;

    /**
     *  Create a new Factory instance
     *
     *  @param  Config $config
     *  @return void
     */
    public function __construct(Config $config)
    {
        $googleApiKey   = $config->get('urlshortener.google.apikey');
        $bitlyUsername  = $config->get('urlshortener.bitly.username');
        $bitlyPassword  = $config->get('urlshortener.bitly.password');
        $bitlyGenericAccessToken  = $config->get('urlshortener.bitly-gat.genericAccessToken');
        $connectTimeout = $config->get('urlshortener.connect_timeout');
        $timeout        = $config->get('urlshortener.timeout');

        $this->google = new Google($googleApiKey, $connectTimeout, $timeout);
        $this->bitly  = new Bitly($bitlyUsername, $bitlyPassword, $connectTimeout, $timeout);
        $this->bitlyGAT  = new BitlyGenericAccessToken($bitlyGenericAccessToken, $connectTimeout, $timeout);
    }

    /**
     *  Create a new Url Shortener driver instance based on its name
     *
     *  @param  string  $driverName     google|bitly
     *  @throws InvalidArgumentException
     *  @return DriverInterface
     */
    public function make($driverName)
    {
        $driverName = trim(strtolower($driverName));
        switch ($driverName) {
            case 'google':
                return $this->google;
            case 'bitly':
                return $this->bitly;
            case 'bitly-gat':
                return $this->bitlyGAT;
            default:
                throw new InvalidArgumentException('Invalid URL Shortener driver name');
        }
    }
}
