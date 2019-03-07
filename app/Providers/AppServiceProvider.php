<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\HubSpot;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      // Bind Hubspot object.
      $this->app->singleton('App\Hubspot', function($app) {
        return new HubSpot();
      });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
