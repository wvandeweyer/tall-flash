<?php

namespace Wvandeweyer\Flash;

use BladeUI\Icons\Factory;
use Illuminate\Support\ServiceProvider;

class FlashServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'flash');

        if ($this->app->runningInConsole()) {
            $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/flash'),
            ], 'views');

            $this->publishes([
                __DIR__.'/../config/flash.php' => config_path('flash.php'),
            ], 'config');
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/flash.php', 'flash');

        // $this->callAfterResolving(Factory::class, function (Factory $factory) {
        //     $factory->add('google-material-design-icon', [
        //         'path' => __DIR__.'/../vendor/codeat3/blade-google-material-design-icons/resources/svg',
        //         'prefix' => 'gmdi',
        //     ]);
        // });
    }
}
