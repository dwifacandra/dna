<?php

namespace App\Core\Clusters\Resumes\Resources\SkillResource\Forms;

use Filament\Forms\Get;
use Illuminate\Support\Facades\Auth;
use App\Core\Components\Forms\{PreviewIcon, RangeSlider};
use Filament\Forms\Components\{TextInput, Hidden, Select, ColorPicker,  Grid};
use App\Core\Clusters\Resumes\Resources\SkillCategoryResource\Forms\SkillCategoryFormSchemes;

class SkillFormSchemes
{
    public static function getOptions(): array
    {
        $icons = app()->make('App\Core\Helpers\CoreIcon')->getIcons();
        return [
            Hidden::make('user_id')->default(Auth::user()->id),
            TextInput::make('name')->required(),
            Select::make('category_id')
                ->label('Category')
                ->relationship('category', 'name')
                ->native(false)->searchable()
                ->required()
                ->preload()
                ->manageOptionForm(SkillCategoryFormSchemes::getOptions()),
            RangeSlider::make('rate')
                ->default(5)
                ->afterStateUpdated(function ($state, $set) {
                    $rateEnum = \App\Core\Enums\Rate::from($state);
                    $set('rate_color', $rateEnum->getColorHex());
                }),
            Grid::make([
                'default' => 2,
            ])->schema([
                Select::make('icon')
                    ->label('Select Icon')
                    ->native(false)
                    ->searchable()
                    ->reactive()
                    ->required()
                    ->options(array_combine($icons, $icons))
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
                PreviewIcon::make('icon_preview')
                    ->label('Preview Icon')
                    ->columnSpanFull()
                    ->visible(fn(Get $get): bool => filled($get('icon'))),
            ]),
        ];
    }
}
