<?php

namespace App\Core\Traits;

use Illuminate\Support\Str;
use App\Core\{Helpers\CoreIcon, Components\Forms\PreviewIcon};
use Filament\{Forms\Get, Support\Colors\Color};
use Filament\Tables\Columns\{Layout\Split, TextColumn, IconColumn};
use Filament\Forms\Components\{Hidden, TextInput, RichEditor, Grid, Select, ColorPicker};

trait Categories
{
    public static function getFormSchemes(string $scope = null): array
    {
        return [
            Hidden::make('scope')->default($scope),
            TextInput::make('name')->required(),
            Select::make('icon')
                ->label('Select Icon')
                ->native(false)
                ->default('core.outline.fonticons')
                ->searchable()
                ->reactive()
                ->required()
                ->options(CoreIcon::getIcons())
                ->prefixIcon(function (Get $get): string {
                    return $get('icon') ?: 'core.outline.fonticons';
                }),
            RichEditor::make('description'),
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
