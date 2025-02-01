<?php

namespace App\Core\Traits;

use Illuminate\Support\Str;
use App\Core\{Helpers\CoreIcon, Components\Forms\PreviewIcon};
use Filament\{Forms\Get, Support\Colors\Color};
use Filament\Tables\Columns\{Layout\Split, TextColumn, IconColumn};
use Filament\Forms\Components\{Hidden, TextInput, MarkdownEditor, Grid, Select, ColorPicker};

trait Categories
{
    public static function getFormSchemes(string $scope = null): array
    {
        return [
            Hidden::make('scope')->default($scope),
            TextInput::make('name')->required(),

            Grid::make([
                'default' => 2,
            ])->schema([
                Select::make('icon')
                    ->label('Select Icon')
                    ->native(false)
                    ->searchable()
                    ->reactive()
                    ->default('core.outline.category')
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
            MarkdownEditor::make('description'),
        ];
    }
    public static function getTableColumns(): array
    {
        return [
            Split::make([
                IconColumn::make('icon')
                    ->size(IconColumn\IconColumnSize::TwoExtraLarge)
                    ->grow(false)
                    ->icon(fn($record) => $record->icon)
                    ->color(fn($record) => Color::hex($record->icon_color)),
                TextColumn::make('name')
                    ->size('2xl')
                    ->description(
                        fn($record) => Str::words(strip_tags(
                            $record->description
                        ), 8, '...')
                    ),
            ])
        ];
    }
    public static function getTableActions(): array
    {
        return DefaultOptions::getDefaultActions();
    }
    public static function getTableBulkActions(): array
    {
        return DefaultOptions::getBulkActionGroups();
    }
}
