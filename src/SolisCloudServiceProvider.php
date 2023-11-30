<?php

namespace Tykus\SolisCloud;

use Illuminate\Support\ServiceProvider;
use Tykus\SolisCloud\Client;

class SolisCloudServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('soliscloud.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'soliscloud');

        $this->app->bind(Client::class, function () { 
            return new Client(config('soliscloud.key_id'), config('soliscloud.key_secret'), config('soliscloud.api_url'));
        });
        
        // Register the main class to use with the facade
        $this->app->singleton('soliscloud', fn() => new SolisCloud($this->app->make(Client::class)));
    }
}
