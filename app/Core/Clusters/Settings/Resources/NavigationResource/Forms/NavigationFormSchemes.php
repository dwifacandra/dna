<?php

namespace App\Core\Clusters\Settings\Resources\NavigationResource\Forms;

use Filament\Forms\Get;
use App\Core\Components\Forms\PreviewIcon;
use App\Core\Helpers\{CoreIcon, CoreRoute};
use App\Core\Enums\{NavigationPosition, IconNavigationPosition};
use Filament\Forms\Components\{TextInput, Select, ToggleButtons, Toggle, Section};

class NavigationFormSchemes
{
    public static function getOptions(): array
    {
        return [
            TextInput::make('label')
                ->required(),
            Select::make('url')
                ->required()
                ->native(false)
                ->searchable()
                ->options(CoreRoute::getRouteOptions()),
            Section::make([
                ToggleButtons::make('icon_position')
                    ->options(IconNavigationPosition::class)
                    ->required()
                    ->inline()
                    ->grouped(),
                ToggleButtons::make('position')
                    ->options(NavigationPosition::class)
                    ->required()
                    ->inline()
                    ->grouped(),
                Toggle::make('icon_only'),
                Toggle::make('active'),
            ])->columns(2),
            Section::make([
                Select::make('icon')
                    ->label('Select Icon')
                    ->native(false)
                    ->searchable()
                    ->reactive()
                    ->required()
                    ->options(CoreIcon::getIcons())
                    ->afterStateUpdated(function ($set, $state, $get) {
                        $set('icon_preview', $state . ':' . $get('icon_color'));
                    }),
                PreviewIcon::make('icon_preview')
                    ->label('Preview Icon')
                    ->columnSpanFull()
                    ->visible(fn(Get $get): bool => filled($get('icon'))),
            ])->columns(2),
        ];
    }
}
