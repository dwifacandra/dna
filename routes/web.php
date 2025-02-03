<?php

use App\Core\Pages\{
    LandingPage,
    About\WhoAmI as WhoAmI,
    Product\Detail as ProductDetail,
};
use Illuminate\Support\Facades\{Route, Artisan, Response};
use App\Http\Middleware\SetLocale;
use App\Http\Controllers\ServePrivateStorage;

Route::middleware([SetLocale::class])->group(function () {
    // App Route
    Route::get('/', LandingPage::class)->name('landing-page');
    // Group Route About
    Route::prefix('about')->group(function () {
        Route::get('/whoami', WhoAmI::class)->name('about.whoami');
    });
    // Group Route Product
    Route::prefix('product')->group(function () {
        Route::get('/{slug}', ProductDetail::class)->name('product.detail');
    });
});
// Signed Media
Route::middleware('signed')->group(function () {
    Route::get('media/{media}/{filename}', ServePrivateStorage::class)->name('media');
});
// Fallback Resource
Route::get('/svg/{svgname}', function ($svgname) {
    $svgPath = resource_path('svg/' . str_replace('.', '/', $svgname) . '.svg');
    if (!file_exists($svgPath)) {
        abort(404, 'SVG file not found.');
    }
    $svgContent = file_get_contents($svgPath);
    return Response::make($svgContent, 200, [
        'Content-Type' => 'image/svg+xml',
    ]);
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
