<?php

namespace Waggingtail\AppleGsx\Laravel;

use Illuminate\Support\ServiceProvider;
use Waggingtail\AppleGsx\AppleGsx;

class AppleGsxServiceProvider extends ServiceProvider
{
    public function register()
    {
        if (! $this->app->configurationIsCached()) {
            $this->mergeConfigFrom(__DIR__.'/../config/applegsx.php', 'applegsx');
        }

        $this->registerAppleGsx();
        $this->offerPublishing();
    }

    public function provides()
    {
        return [
            'applegsx',
        ];
    }

    protected function registerAppleGsx()
    {
        $this->app->singleton('Waggingtail\AppleGsx\AppleGsx', function ($app) {
            $config = $app['config']->get('applegsx');

            [
                'sold_to' => $soldTo,
                'ship_to' => $shipTo,
                'pass_phrase' => $passPhrase,
                'use_uat' => $useUat,
            ] = $config;

            $caBundlePath = storage_path($config['ca_bundle_path']);

            return new AppleGsx($soldTo, $shipTo, $caBundlePath, $passPhrase, $useUat);
        });

        $this->app->alias('applegsx', AppleGsx::class);
    }

    protected function offerPublishing()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/applegsx.php' => config_path('applegsx.php'),
            ], 'apple-config');
        }
    }
}