<?php

namespace App\Providers\Google;

use Illuminate\Support\ServiceProvider;
use App\Providers\Google\GoogleSheetService;

class GoogleServices extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        $this->app->singleton(GoogleSheetService::class, function ($app) {
            return new GoogleSheetService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
