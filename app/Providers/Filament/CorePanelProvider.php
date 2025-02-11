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
use Althinect\FilamentSpatieRolesPermissions\FilamentSpatieRolesPermissionsPlugin;

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
            ->passwordReset()
            ->emailVerification()
            ->profile()
            ->authGuard('web')
            ->authPasswordBroker('users')
            ->maxContentWidth(MaxWidth::Full)
            ->sidebarCollapsibleOnDesktop()
            ->globalSearchKeyBindings(['command+k', 'ctrl+k'])
            ->navigation(Navigations::getNavigations())
            ->unsavedChangesAlerts()
            ->databaseTransactions()
            ->databaseNotifications()
            ->databaseNotificationsPolling('5s')
            ->viteTheme('resources/css/filament/core/theme.css')
            ->favicon(asset('img/favicon.png'))
            ->darkMode(false)
            ->colors([
                'primary' => '#292929',
                'danger' => Color::Rose,
                'info' => Color::Blue,
                'success' => Color::Emerald,
                'warning' => Color::Orange,
                'slate' => Color::Slate,
                'gray' => Color::Gray,
                'zinc' => Color::Zinc,
                'neutral' => Color::Neutral,
                'stone' => Color::Stone,
                'red' => Color::Red,
                'orange' => Color::Orange,
                'amber' => Color::Amber,
                'yellow' => Color::Yellow,
                'lime' => Color::Lime,
                'green' => Color::Green,
                'emerald' => Color::Emerald,
                'teal' => Color::Teal,
                'cyan' => Color::Cyan,
                'sky' => Color::Sky,
                'blue' => Color::Blue,
                'indigo' => Color::Indigo,
                'violet' => Color::Violet,
                'purple' => Color::Purple,
                'fuchsia' => Color::Fuchsia,
                'pink' => Color::Pink,
                'rose' => Color::Rose,
            ])
            ->font('Roboto')
            ->discoverClusters(in: app_path('Core/Clusters'), for: 'App\\Core\\Clusters')
            ->discoverResources(in: app_path('Core/Resources'), for: 'App\\Core\\Resources')
            ->discoverPages(in: app_path('Core/Pages'), for: 'App\\Core\\Pages')
            ->discoverWidgets(in: app_path('Core/Widgets'), for: 'App\\Core\\Widgets')
            ->plugin(
                FilamentSpatieRolesPermissionsPlugin::make(),
            )
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
