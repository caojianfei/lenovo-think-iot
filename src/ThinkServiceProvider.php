<?php

namespace CJF\ThinkIot;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class ThinkServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/lenovo-think.php' => config_path('lenovo-think-iot.php')
        ], 'config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/lenovo-think.php', 'lenovo-think-iot');

        $this->app->singleton(ThinkManage::class);

        $this->app->alias(ThinkManage::class, 'thinkiot');
    }
}
