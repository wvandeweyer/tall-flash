<?php

namespace Wvandeweyer\Flash;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class FlashServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'flash');

        Livewire::component('flash-message', \Wvandeweyer\Flash\Livewire\FlashMessage::class);

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
    }
}
