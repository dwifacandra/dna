<?php

use Illuminate\Support\Facades\{Route};
use App\Http\Controllers\{Dev\AutomationController};

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
                Route::get('permission', [AutomationController::class, 'command'])
                    ->defaults('command', 'permissions:sync')
                    ->name('dev.permission');
            });
        });
    });
});
