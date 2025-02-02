<?php

use App\Core\Pages\{
    LandingPage,
    Product\Detail as ProductDetail,
};
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServePrivateStorage;

Route::middleware([SetLocale::class])->group(function () {
    Route::get('/', LandingPage::class)->name('landing-page');
    Route::get('/product/{slug}', ProductDetail::class)->name('product.detail');
});
Route::middleware('signed')->group(function () {
    Route::get('media/{media}/{filename}', ServePrivateStorage::class)->name('media');
});
