<?php

namespace Wvandeweyer\Flash\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Wvandeweyer\Flash\FlashServiceProvider;

class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            FlashServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');
    }

    public function notificationTypes(): array
    {
        return [
            ['success'],
            ['error'],
            ['warning'],
            ['info'],
        ];
    }
}
