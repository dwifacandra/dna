<?php

namespace App\Providers\Google;

use Illuminate\Support\ServiceProvider;
use App\Providers\Google\GoogleSheetService;

class GoogleServices extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(GoogleSheetService::class, function ($app) {
            return new GoogleSheetService();
        });
    }
    public function boot(): void {}
}
