<?php

namespace App\Core\Clusters\Resumes\Resources\SkillResource\Forms;

use Filament\Forms\Get;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use App\Core\{Enums\Rate, Helpers\CoreIcon, Traits\Categories};
use App\Core\Components\Forms\{PreviewIcon, RangeSlider};
use Filament\Forms\Components\{TextInput, Hidden, Select, ColorPicker,  Grid};

class SkillFormSchemes
{
    public static function getOptions(): array
    {
        return [
            Hidden::make('user_id')->default(Auth::user()->id),
            TextInput::make('name')->required(),
            Select::make('category_id')
                ->relationship(
                    name: 'category',
                    titleAttribute: 'name',
                    modifyQueryUsing: fn(Builder $query) => $query->where('scope', 'resume_skill'),
                )
                ->manageOptionForm(Categories::getFormSchemes('resume_skill'))
                ->native(false)
                ->searchable()
                ->required()
                ->preload(),
            RangeSlider::make('rate')
                ->default(5)
                ->afterStateUpdated(function ($state, $set) {
                    $rateEnum = Rate::from($state);
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
                    ->options(CoreIcon::getIcons())
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
