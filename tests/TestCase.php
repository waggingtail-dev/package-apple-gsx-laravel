<?php

namespace Waggingtail\AppleGsx\Laravel\Tests;

use Waggingtail\AppleGsx\Laravel\AppleGsxServiceProvider;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            AppleGsxServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        parent::getEnvironmentSetUp($app);
    }
}
