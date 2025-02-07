<?php

namespace App\Core\Traits;

use App\Models\{Navigation,};
use Illuminate\Support\Collection;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\{NavigationBuilder, NavigationItem,};
use App\Core\Clusters\{Products, Peoples, Resumes, Developments, Finances, Settings};

trait Navigations
{
    public static function getTopNavigations(): Collection
    {
        return Navigation::TopNavigations()->get();
    }
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
            self::pagesNavigationGroup(),
            Products::NavigationItems(),
            Finances::NavigationItems(),
            Peoples::NavigationItems(),
            Resumes::NavigationItems(),
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
                    ->group('Pages')
                    ->url(route('landing-page')),
                NavigationItem::make('Sitemap')
                    ->icon('core.outline.travel_explore')
                    ->group('Pages')
                    ->url(route('dev.sitemap')),
            ]);
    }
}
