<?php

use App\Core\Pages\{
    LandingPage,
    About\WhoAmI as WhoAmI,
    Product\Detail as ProductDetail,
};
use Illuminate\Support\Facades\{Route, Artisan, Response};
use App\Http\Middleware\SetLocale;
use App\Http\Controllers\{ServePrivateStorage, Dev\AutomationController};

Route::middleware([SetLocale::class])->group(function () {
    // App Route
    Route::get('/', LandingPage::class)->name('landing-page');
    // Group Route About
    Route::prefix('about')->group(function () {
        Route::get('/', function () {
            return redirect()->route('about.whoami');
        })->name('about');
        Route::get('/whoami', WhoAmI::class)->name('about.whoami');
    });
    // Group Route Blog
    Route::prefix('blog')->group(function () {
        Route::get('/', function () {
            return redirect()->route('landing-page');
        })->name('blog');
        Route::get('/post/{slug}', ProductDetail::class)->name('blog.post.detail');
    });
    // Group Route Product
    Route::prefix('product')->group(function () {
        Route::get('/', function () {
            return redirect()->route('landing-page');
        })->name('product');
        Route::get('/{slug}', ProductDetail::class)->name('product.detail');
    });
    // Group Route Design
    Route::prefix('design')->group(function () {
        Route::get('/', function () {
            return redirect()->route('landing-page');
        })->name('design');
        Route::get('/{slug}', ProductDetail::class)->name('design.detail');
    });
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
    // Route Only for Adminstrator
    Route::group(['middleware' => ['role:Adminstrator']], function () {
        Route::prefix('core/dev')->group(function () {
            // Storage
            Route::prefix('storage')->group(function () {
                Route::get('link', [AutomationController::class, 'link'])->name('dev.storage.link');
                Route::get('unlink', [AutomationController::class, 'unlink'])->name('dev.storage.unlink');
            });
            // Automation
            Route::prefix('auto')->group(function () {
                Route::get('migrate', [AutomationController::class, 'command'])
                    ->defaults('command', 'migrate')
                    ->name('dev.migrate');
                Route::get('optimize', [AutomationController::class, 'command'])
                    ->defaults('command', 'optimize')
                    ->name('dev.optimizer');
                Route::get('queue', [AutomationController::class, 'command'])
                    ->defaults('command', 'queue:work')
                    ->name('dev.queue');
            });
        });
    });
});
// Sitemap Generator
Route::get('/sitemap', [AutomationController::class, 'sitemap'])->name('dev.sitemap');
// Signed Media
Route::middleware('signed')->group(function () {
    Route::get('media/{media}/{filename}', ServePrivateStorage::class)->name('media');
});
