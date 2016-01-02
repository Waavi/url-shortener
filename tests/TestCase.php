<?php

namespace Waavi\UrlShortener\Test;

use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            \Waavi\UrlShortener\UrlShortenerServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'UrlShortener' => \Waavi\UrlShortener\Facades\UrlShortener::class,
        ];
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
        $app['config']->set('app.key', 'sF5r4kJy5HEcOEx3NWxUcYj1zLZLHxuu');
    }
}
