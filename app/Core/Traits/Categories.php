<?php

namespace App\Core\Traits;

use Illuminate\Support\Str;
use Filament\Tables\Columns\{Layout\Split, TextColumn};
use Filament\Forms\Components\{Hidden, TextInput, MarkdownEditor};

trait Categories
{
    public static function getFormSchemes(string $scope = null): array
    {
        return [
            Hidden::make('scope')->default($scope),
            TextInput::make('name')->required(),
            MarkdownEditor::make('description'),
        ];
    }
    public static function getTableColumns(): array
    {
        return [
            Split::make([
                TextColumn::make('name')
                    ->size('2xl')
                    ->description(
                        fn($record) => Str::limit(strip_tags(
                            $record->description
                        ), 100)
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
