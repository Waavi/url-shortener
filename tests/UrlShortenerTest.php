<?php

namespace Waavi\UrlShortener\Test;

use Mockery;
use Waavi\UrlShortener\Drivers\BaseDriver;
use Waavi\UrlShortener\Drivers\Factory;
use Waavi\UrlShortener\UrlShortener;

class UrlShortenerTest extends TestCase
{
    /**
     *  @test
     */
    public function it_calls_the_driver_to_shorten()
    {
        $factory   = Mockery::mock(Factory::class);
        $driver    = Mockery::mock(BaseDriver::class);
        $shortener = new UrlShortener($factory);

        $factory->shouldReceive('make')->with('driverName')->andReturn($driver);
        $shortener->setDriver('driverName');

        $driver->shouldReceive('shorten')->with('http://google.com')->andReturn('short');
        $url = $shortener->shorten('http://google.com');
        $this->assertEquals('short', $url);
    }

    /**
     *  @test
     */
    public function it_calls_the_driver_to_expand()
    {
        $factory   = Mockery::mock(Factory::class);
        $driver    = Mockery::mock(BaseDriver::class);
        $shortener = new UrlShortener($factory);

        $factory->shouldReceive('make')->with('driverName')->andReturn($driver);
        $shortener->setDriver('driverName');

        $driver->shouldReceive('expand')->with('http://google.com')->andReturn('short');
        $url = $shortener->expand('http://google.com');
        $this->assertEquals('short', $url);
    }

    /**
     *  @test
     */
    public function it_returns_new_instance_on_driver_hot_swap()
    {
        $this->assertInstanceOf(UrlShortener::class, \UrlShortener::driver('google'));
    }
}
