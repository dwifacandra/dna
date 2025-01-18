<?php

namespace App\Providers;

use Filament\View\PanelsRenderHook;
use Illuminate\Support\ServiceProvider;
use Filament\Support\Facades\FilamentIcon;
use Filament\Support\Facades\FilamentView;
use App\Core\Components\Layouts\Navbar\PanelNavigation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        FilamentIcon::register([
            'panels::sidebar.expand-button' => 'icon-core.fill.dashboard',
            'panels::sidebar.collapse-button' => 'icon-fa.solid.chevron-left',
        ]);
        FilamentView::registerRenderHook(
            PanelsRenderHook::TOPBAR_START,
            fn() => \Livewire\Livewire::mount(PanelNavigation::class)
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
