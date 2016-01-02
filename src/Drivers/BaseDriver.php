<?php

namespace Waavi\UrlShortener\Drivers;

use Guzzle\Http\Exception\BadResponseException;
use Mremi\UrlShortener\Exception\InvalidApiResponseException;
use Mremi\UrlShortener\Model\Link;

abstract class BaseDriver
{
    /**
     *  Url Shortener Provider
     *
     *  @var Mremi\UrlShortener\Provider\Google\GoogleProvider|Mremi\UrlShortener\Provider\Bitly\BitlyProvider
     */
    protected $provider;

    /**
     *  Shorten the given url
     *
     *  @param  string $url
     *  @return string
     */
    public function shorten($url)
    {
        try {
            $link = new Link;
            $link->setLongUrl($url);
            $this->provider->shorten($link);
            return $link->getShortUrl();
        } catch (BadResponseException $e) {
            return $url;
        } catch (InvalidApiResponseException $e) {
            return $url;
        }
    }

    /**
     *  Expand the given url
     *
     *  @param  string $url
     *  @return string
     */
    public function expand($url)
    {
        try {
            $link = new Link;
            $link->setShortUrl($url);
            $this->provider->expand($link);
            return $link->getLongUrl();
        } catch (BadResponseException $e) {
            return $url;
        } catch (InvalidApiResponseException $e) {
            return $url;
        }
    }
}
