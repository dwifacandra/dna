<?php

namespace App\Core\Traits;

use Filament\Navigation\NavigationGroup;
use Filament\Navigation\{NavigationBuilder, NavigationItem,};
use App\Core\Clusters\{Collections, Products, Peoples, Resumes, Developments, Finances, Settings};

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
            Collections::NavigationItems(),
            Products::NavigationItems(),
            Finances::NavigationItems(),
            Peoples::NavigationItems(),
            Resumes::NavigationItems(),
            self::pagesNavigationGroup(),
            Developments::NavigationItems(),
            Settings::NavigationItems(),
        ];
    }
    public static function getItems()
    {
        return [];
    }
    public static function pagesNavigationGroup()
    {
        return NavigationGroup::make('Pages')
            ->icon('core.outline.public')
            ->collapsed()
            ->items([
                NavigationItem::make('Landing Page')
                    ->icon('core.outline.home')
                    ->url(route('landing-page')),
                NavigationItem::make('Sitemap')
                    ->icon('core.outline.travel_explore')
                    ->url(route('dev.sitemap')),
            ]);
    }
}
