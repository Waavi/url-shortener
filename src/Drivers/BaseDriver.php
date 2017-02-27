<?php

namespace Waavi\UrlShortener\Drivers;

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
     *  @throws \Guzzle\Http\Exception\BadResponseException
     *  @throws \Mremi\UrlShortener\Exception\InvalidApiResponseException
     *  @return string
     */
    public function shorten($url)
    {
        $link = new Link;
        $link->setLongUrl($url);
        $this->provider->shorten($link);
        return $link->getShortUrl();
    }

    /**
     *  Expand the given url
     *
     *  @param  string $url
     *  @throws \Guzzle\Http\Exception\BadResponseException
     *  @throws \Mremi\UrlShortener\Exception\InvalidApiResponseException
     *  @return string
     */
    public function expand($url)
    {
        $link = new Link;
        $link->setShortUrl($url);
        $this->provider->expand($link);
        return $link->getLongUrl();
    }
}
