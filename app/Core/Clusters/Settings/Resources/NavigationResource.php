<?php

namespace App\Core\Clusters\Settings\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Form;
use App\Models\Navigation;
use Filament\Tables\Table;
use App\Core\Helpers\CoreIcon;
use App\Core\Clusters\Settings;
use App\Core\Helpers\CoreRoute;
use Filament\Resources\Resource;
use App\Core\Traits\DefaultOptions;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Support\Enums\Alignment;
use App\Core\Enums\NavigationPosition;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SubNavigationPosition;
use App\Core\Components\Forms\PreviewIcon;
use App\Core\Enums\IconNavigationPosition;
use Filament\Forms\Components\ToggleButtons;
use App\Core\Clusters\Settings\Resources\NavigationResource\Pages;

class NavigationResource extends Resource
{

    protected static ?string $cluster = Settings::class;
    protected static ?string $model = Navigation::class;
    protected static ?string $modelLabel = 'Navigation';
    protected static ?string $recordTitleAttribute = 'label';
    protected static ?string $navigationIcon = 'icon-core.outline.grid_view';
    protected static ?string $activeNavigationIcon = 'icon-core.fill.grid_view';
    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('label')
                    ->required(),
                Select::make('url')
                    ->required()
                    ->native(false)
                    ->searchable()
                    ->options(CoreRoute::getRouteOptions()),
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
            ]);
    }

    public static function table(Table $table): Table
    {
        DefaultOptions::getColumnConfigs(['alignment' => 'center']);
        return $table
            ->columns([
                IconColumn::make('icon')
                    ->icon(fn($record) => $record->icon),
                TextColumn::make('label')
                    ->alignment(Alignment::Left),
                TextColumn::make('url')
                    ->alignment(Alignment::Left),
                TextColumn::make('position')
                    ->badge(),
                TextColumn::make('icon_position')
                    ->badge(),
                IconColumn::make('icon_only')
                    ->boolean(),
                IconColumn::make('active')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageNavigations::route('/'),
        ];
    }
}
