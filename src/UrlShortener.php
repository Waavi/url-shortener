<?php

namespace Waavi\UrlShortener;

class UrlShortener
{
    /**
     *  Build a new UrlShortener instance
     *
     *  @param  Drivers\DriverInterface     $driver
     *  @param  Drivers\Factory             $driverFactory
     *  @return void
     */
    public function __construct(Drivers\Factory $driverFactory)
    {
        $this->driverFactory = $driverFactory;
    }

    /**
     *  Set the current driver by name
     *
     *  @param  string $driverName
     *  @return void
     */
    public function setDriver($driverName)
    {
        $this->driver = $this->driverFactory->make($driverName);
    }

    /**
     *  Creates a new URL Shortener instance with the given driver name.
     *  Useful for chained calls using the facade when a different driver is to be used for just one request.
     *
     *  @param  string $driverName
     *  @return UrlShortener
     */
    public function driver($driverName)
    {
        $shortener = new UrlShortener($this->driverFactory);
        $shortener->setDriver($driverName);
        return $shortener;
    }

    /**
     *  Shorten the given url
     *
     *  @param  string  $url
     *  @return string
     */
    public function shorten($url)
    {
        return $this->driver->shorten($url);
    }

    /**
     *  Expand the given url
     *
     *  @param  string  $url
     *  @return string
     */
    public function expand($url)
    {
        return $this->driver->expand($url);
    }
}
