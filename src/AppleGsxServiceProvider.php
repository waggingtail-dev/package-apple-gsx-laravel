<?php

namespace Waggingtail\AppleGsx\Laravel;

use Illuminate\Support\ServiceProvider;
use Waggingtail\AppleGsx\AppleGsx;

class AppleGsxServiceProvider extends ServiceProvider
{
    /**
     * Register package services.
     *
     * @return void
     */
    public function register()
    {
        if (! $this->app->configurationIsCached()) {
            $this->mergeConfigFrom(__DIR__.'/../config/applegsx.php', 'applegsx');
        }

        $this->registerAppleGsx();
    }

    /**
     * Bootstrap package services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/applegsx.php' => config_path('applegsx.php'),
            ], 'config');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function provides()
    {
        return [
            'applegsx',
        ];
    }

    /**
     * Register package services.
     *
     * @return void
     */
    protected function registerAppleGsx()
    {
        $this->app->singleton('applegsx', function ($app) {
            $config = $app['config']->get('applegsx');

            [
                'apple_id' => $appleUserId,
                'sold_to' => $soldTo,
                'ship_to' => $shipTo,
                'pass_phrase' => $passPhrase,
                'use_uat' => $useUat,
            ] = $config;

            $caBundlePath = storage_path($config['ca_bundle_path']);

            return new AppleGsx($appleUserId, $soldTo, $shipTo, $caBundlePath, $passPhrase, $useUat);
        });

        $this->app->alias('applegsx', AppleGsx::class);
    }
}