<?php

namespace Waavi\UrlShortener;

use Illuminate\Support\ServiceProvider;

class UrlShortenerServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/urlshortener.php' => config_path('urlshortener.php'),
        ]);
        $this->mergeConfigFrom(
            __DIR__ . '/../config/urlshortener.php', 'urlshortener'
        );
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('urlshortener.factory', Drivers\Factory::class);
        $this->app->singleton('urlshortener', function ($app) {
            $shortener = new UrlShortener($app['urlshortener.factory']);
            $shortener->setDriver($app['config']->get('urlshortener.driver'));
            return $shortener;
        });
    }
}
