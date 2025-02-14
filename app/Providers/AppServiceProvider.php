<?php

namespace App\Providers;

use App\Models\User;
use Filament\Tables\Table;
use Filament\View\{PanelsRenderHook};
use App\Policies\{RolePolicy, PermissionPolicy};
use Spatie\Permission\Models\{Role, Permission};
use App\Core\Components\{Buttons\LandingPage as BackButton};
use Illuminate\Support\{ServiceProvider, Facades\Gate};
use Filament\Support\Facades\{FilamentIcon, FilamentView};

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        FilamentIcon::register([
            'panels::sidebar.expand-button' => 'icon-core.fill.grid_view',
            'panels::sidebar.collapse-button' => 'icon-fa.solid.chevron-left',
        ]);
        FilamentView::registerRenderHook(
            PanelsRenderHook::AUTH_LOGIN_FORM_AFTER,
            fn() => \Livewire\Livewire::mount(BackButton::class)
        );
    }
    public function boot(): void
    {
        Table::$defaultNumberLocale = 'id';
        Table::$defaultCurrency = 'IDR';
        Table::$defaultDateDisplayFormat = 'd/m/o';
        Table::$defaultDateTimeDisplayFormat = 'd/m/o H:i';
    }
}
