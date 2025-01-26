<?php

namespace App\Providers\Filament;

use App\Core\Traits\Navigations;
use Filament\{
    Panel,
    PanelProvider,
    Support\Colors\Color,
    Support\Enums\MaxWidth,
    Http\Middleware\Authenticate,
    Http\Middleware\AuthenticateSession,
    Http\Middleware\DisableBladeIconComponents,
    Http\Middleware\DispatchServingFilamentEvent,
};
use Illuminate\{
    Cookie\Middleware\EncryptCookies,
    Cookie\Middleware\AddQueuedCookiesToResponse,
    Foundation\Http\Middleware\VerifyCsrfToken,
    Routing\Middleware\SubstituteBindings,
    Session\Middleware\StartSession,
    View\Middleware\ShareErrorsFromSession,
};

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
