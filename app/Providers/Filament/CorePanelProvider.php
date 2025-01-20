<?php

namespace App\Providers\Filament;

use Filament\Panel;
use Filament\PanelProvider;
use App\Core\Traits\Navigations;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\MaxWidth;
use Filament\Http\Middleware\Authenticate;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Filament\Http\Middleware\AuthenticateSession;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Outerweb\FilamentImageLibrary\Filament\Plugins\FilamentImageLibraryPlugin;

class CorePanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('core')
            ->path('core')
            ->spa()
            ->login()
            // ->topbar(false)
            ->maxContentWidth(MaxWidth::Full)
            ->sidebarCollapsibleOnDesktop()
            ->globalSearchKeyBindings(['command+k', 'ctrl+k'])
            ->navigation(Navigations::getNavigations())
            ->databaseTransactions()
            ->databaseNotifications()
            ->viteTheme('resources/css/filament/core/theme.css')
            ->colors([
                'primary' => Color::Slate,
                'danger' => Color::Rose,
                'gray' => Color::Gray,
                'info' => Color::Blue,
                'success' => Color::Emerald,
                'warning' => Color::Orange,
            ])
            ->font('Roboto')
            ->discoverClusters(in: app_path('Core/Clusters'), for: 'App\\Core\\Clusters')
            ->discoverResources(in: app_path('Core/Resources'), for: 'App\\Core\\Resources')
            ->discoverPages(in: app_path('Core/Pages'), for: 'App\\Core\\Pages')
            ->discoverWidgets(in: app_path('Core/Widgets'), for: 'App\\Core\\Widgets')
            ->plugins([
                FilamentImageLibraryPlugin::make()
                    ->allowedDisks([
                        'public' => 'Public images',
                        'private' => 'Private images',
                    ]),
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
