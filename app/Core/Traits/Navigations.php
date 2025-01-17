<?php

namespace App\Core\Traits;

use Filament\Navigation\NavigationItem;
use Filament\Navigation\NavigationBuilder;
use App\Core\Clusters\{Projects, Peoples, Resumes, Developments};
use Filament\Pages\Auth\EditProfile;

trait Navigations
{
    public static function getNavigations()
    {
        return function (NavigationBuilder $builder): NavigationBuilder {
            $builder->groups(self::getGroups());
            $builder->items(self::getItems());
            return $builder;
        };
    }

    public static function getGroups(): array
    {
        return [
            Projects::NavigationItems(),
            Peoples::NavigationItems(),
            Resumes::NavigationItems(),
            Developments::NavigationItems(),
        ];
    }

    public static function getItems()
    {
        return [
            // NavigationItem::make('Dashboard')
            //     ->icon('heroicon-o-home')
            //     ->isActiveWhen(fn(): bool => request()->routeIs('filament.admin.pages.dashboard'))
            //     ->url(fn(): string => EditProfile::getUrl()),
        ];
    }
}
