<?php

use App\Core\Pages\Basic;
use App\Core\Pages\LandingPage;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;

Route::middleware([SetLocale::class])->group(function () {
    Route::get('/', LandingPage::class)->name('landing-page');
});
