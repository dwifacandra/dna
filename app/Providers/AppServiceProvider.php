<?php

namespace App\Providers;

use App\Models\User;
use Filament\Tables\Table;
use Filament\View\{PanelsRenderHook};
use App\Policies\{RolePolicy, PermissionPolicy};
use Spatie\Permission\Models\{Role, Permission};
use App\Core\Components\Layouts\Navbar\PanelNavigation;
use Illuminate\Support\{ServiceProvider, Facades\Gate};
use Filament\Support\Facades\{FilamentIcon, FilamentView,};

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
        // FilamentView::registerRenderHook(
        //     PanelsRenderHook::SIDEBAR_NAV_END,
        //     fn() => \Livewire\Livewire::mount(PanelNavigation::class)
        // );
    }
    public function boot(): void
    {
        Gate::before(function (User $user, string $ability) {
            return $user->isSuperAdmin() ? true : null;
        });
        Table::$defaultNumberLocale = 'id';
        Table::$defaultCurrency = 'IDR';
        Table::$defaultDateDisplayFormat = 'd/m/o';
        Table::$defaultDateTimeDisplayFormat = 'd/m/o H:i';
        Gate::policy(Role::class, RolePolicy::class);
        Gate::policy(Permission::class, PermissionPolicy::class);
    }
}
