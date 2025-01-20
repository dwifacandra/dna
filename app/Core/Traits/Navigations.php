<?php

namespace App\Core\Traits;

use App\Models\Navigation;
use Illuminate\Support\Collection;
use Filament\Navigation\NavigationItem;
use App\Core\Resources\{GalleryResource};
use Filament\Navigation\NavigationBuilder;
use Outerweb\FilamentImageLibrary\Filament\Pages\ImageLibrary;
use App\Core\Clusters\{Projects, Peoples, Resumes, Developments, Settings};

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
            Projects::NavigationItems(),
            Peoples::NavigationItems(),
            Resumes::NavigationItems(),
            Developments::NavigationItems(),
            Settings::NavigationItems(),
        ];
    }

    public static function getItems()
    {
        return [
            NavigationItem::make('Gallery')
                ->icon('core.outline.photo_library')
                ->sort(5)
                ->isActiveWhen(fn(): bool => request()->routeIs('filament.core.pages.image-library'))
                ->url(fn(): string => ImageLibrary::getUrl()),
        ];
    }
}
