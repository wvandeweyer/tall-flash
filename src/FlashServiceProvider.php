<?php

namespace Wvandeweyer\Flash;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Wvandeweyer\Flash\Commands\FlashCommand;

class FlashServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('flash')
            ->hasConfigFile()
            ->hasViews();
    }
}
