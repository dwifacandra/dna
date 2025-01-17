<?php

namespace App\Core\Clusters\Resumes\Resources\SkillResource\Forms;

use Illuminate\Support\Facades\Auth;
use Filament\Forms\Get;
use Filament\Forms\Components\{TextInput, Hidden, Select, ColorPicker, Split};
use App\Core\Components\Forms\{PreviewIcon, RangeSlider};

class SkillFormSchemes
{
    public static function getOptions(): array
    {
        $icons = app()->make('App\Core\Helpers\CoreIcon')->getIcons();
        return [
            Hidden::make('user_id')->default(Auth::user()->id),
            TextInput::make('name')->required(),
            Split::make([
                Select::make('icon')->label('Select Icon')
                    ->native(false)->searchable()
                    ->options(array_combine($icons, $icons))
                    ->reactive()->required()
                    ->afterStateUpdated(function ($set, $state, $get) {
                        $set('icon_preview', $state . ':' . $get('icon_color'));
                    }),
                ColorPicker::make('icon_color')
                    ->reactive()
                    ->default('#171717')
                    ->visible(fn(Get $get): bool => filled($get('icon')))
                    ->afterStateUpdated(function ($set, $state, $get) {
                        $set('icon_preview', $get('icon') . ':' . $state);
                    }),
            ]),
            RangeSlider::make('rate')
                ->default(5)
                ->afterStateUpdated(function ($state, $set) {
                    $rateEnum = \App\Core\Enums\Rate::from($state);
                    $set('rate_color', $rateEnum->getColorHex());
                }),
            PreviewIcon::make('icon_preview')->label('Preview Icon'),
        ];
    }
}
