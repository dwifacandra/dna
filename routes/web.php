<?php

use App\Core\Pages\{
    LandingPage,
    Product\Detail as ProductDetail,
};
use Illuminate\Support\Facades\{Route, Artisan};
use App\Http\Middleware\SetLocale;
use App\Http\Controllers\ServePrivateStorage;

Route::middleware([SetLocale::class])->group(function () {
    Route::get('/', LandingPage::class)->name('landing-page');
    Route::get('/product/{slug}', ProductDetail::class)->name('product.detail');
});
Route::middleware('signed')->group(function () {
    Route::get('media/{media}/{filename}', ServePrivateStorage::class)->name('media');
});

// Shared Hosting Tools
Route::middleware(['auth'])->group(function () {
    Route::get('/storage-link', function () {
        $exitCode = Artisan::call('storage:link');
        return 'Storage Linked';
    })->name('dev.storage.link');
    Route::get('/storage-unlink', function () {
        $exitCode = Artisan::call('storage:unlink');
        return 'Storage Unlinked';
    })->name('dev.storage.unlink');
    Route::get('/optimize', function () {
        $exitCode = Artisan::call('optimize');
        return redirect('/core');
    })->name('dev.optimizer');
});
Route::get('/sitemap', function () {
    $exitCode = Artisan::call('sitemap:generate');
    return redirect('/sitemap.xml');
})->name('dev.sitemap');
