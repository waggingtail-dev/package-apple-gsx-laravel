<?php

namespace Waggingtail\AppleGsx\Laravel\Tests;

use ReflectionClass;

class FacadeTest extends TestCase
{
    /** @test */
    public function it_can_test_it_is_a_facade()
    {
        $facade = new ReflectionClass('Illuminate\Support\Facades\Facade');

        $reflection = new ReflectionClass('Waggingtail\AppleGsx\Laravel\Facades\AppleGsx');

        $this->assertTrue($reflection->isSubclassOf($facade));
    }
}