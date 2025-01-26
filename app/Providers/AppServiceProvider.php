<?php

namespace App\Providers;

use Filament\View\{PanelsRenderHook};
use Illuminate\Support\{ServiceProvider};
use Filament\Support\Facades\{FilamentIcon, FilamentView,};
use App\Core\Components\Layouts\Navbar\PanelNavigation;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        FilamentIcon::register([
            'panels::sidebar.expand-button' => 'icon-core.color.dnadeveloper',
            'panels::sidebar.collapse-button' => 'icon-fa.solid.chevron-left',
        ]);
        FilamentView::registerRenderHook(
            PanelsRenderHook::TOPBAR_START,
            fn() => \Livewire\Livewire::mount(PanelNavigation::class)
        );
    }
    public function boot(): void {}
}
