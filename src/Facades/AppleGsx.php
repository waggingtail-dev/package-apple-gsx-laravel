<?php

namespace Waggingtail\AppleGsx\Laravel\Facades;

use Illuminate\Support\Facades\Facade;

class AppleGsx extends Facade
{
    /**
     * {@inheritdoc}
     */
    protected static function getFacadeAccessor()
    {
        return 'applegsx';
    }
}