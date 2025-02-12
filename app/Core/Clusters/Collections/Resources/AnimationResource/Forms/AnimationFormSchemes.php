<?php

namespace App\Core\Clusters\Collections\Resources\AnimationResource\Forms;

use Filament\Forms\{Get, Set};
use Illuminate\Support\{Str, Collection, Facades\Auth};
use App\Core\Traits\Categories;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\{TextInput, ToggleButtons, RichEditor, Grid, TagsInput, Hidden, Select, SpatieMediaLibraryFileUpload};

class AnimationFormSchemes
{
    public static function getOptions(): array
    {
        return [
            Hidden::make('author_id')
                ->required()
                ->default(Auth::user()->id),
            Hidden::make('scope')
                ->required()
                ->default('Animation'),
            TextInput::make('title')
                ->required()
                ->autocapitalize('words')
                ->dehydrateStateUsing(fn(string $state): string => Str::title($state)),
            Select::make('category_id')
                ->relationship(
                    name: 'category',
                    titleAttribute: 'name',
                    modifyQueryUsing: fn(Builder $query) => $query->where('scope', 'collection'),
                )
                ->manageOptionForm(Categories::getFormSchemes('collection'))
                ->required()
                ->native(false),
            RichEditor::make('description')
                ->columnSpanFull(),
            TagsInput::make('tags')
                ->live(debounce: 500)
                ->afterStateUpdated(function (Get $get, Set $set, $state): array {
                    if ($get('no_keywords')) {
                        return $set('keywords', $state);
                    }
                    return [];
                }),
            TagsInput::make('keywords'),
            Grid::make([
                'default' => 2,
                'md' => 4,
            ])->schema([
                ToggleButtons::make('no_keywords')
                    ->label('Tags : Keywords ?')
                    ->inline()
                    ->grouped()
                    ->default(true)
                    ->boolean(),
                ToggleButtons::make('source')
                    ->live(debounce: 500)
                    ->inline()
                    ->grouped()
                    ->default('external')
                    ->options([
                        'internal' => 'Local',
                        'external' => 'External',
                    ]),
                ToggleButtons::make('status')
                    ->live(debounce: 500)
                    ->inline()
                    ->grouped()
                    ->default('draft')
                    ->options([
                        'draft' => 'Draft',
                        'publish' => 'Publish',
                    ]),
            ]),
            TextInput::make('source_url')
                ->label('Source Url')
                ->prefix('https://www.youtube.com/watch?v=')
                ->prefixIcon('fa.brands.youtube')
                ->required(fn(Get $get): bool => $get('source') === 'external')
                ->hidden(fn(Get $get): bool => $get('source') === 'internal')
                ->columnSpanFull(),
            SpatieMediaLibraryFileUpload::make('attachment')
                ->required(fn(Get $get): bool => $get('source') === 'internal')
                ->hidden(fn(Get $get): bool => $get('source') === 'external')
                ->disk('private')->visibility('private')
                ->collection('collections')
                ->customProperties(['scope' => 'attachment'])
                ->filterMediaUsing(fn(Collection $media): Collection => $media->where('custom_properties.scope', 'attachment'))
                ->acceptedFileTypes(['video/mp4'])
                ->openable()
                ->downloadable()
                ->columnSpanFull(),
            SpatieMediaLibraryFileUpload::make('cover')
                ->required()
                ->disk('public')->visibility('public')
                ->collection('collections')
                ->customProperties(['scope' => 'cover'])
                ->filterMediaUsing(fn(Collection $media): Collection => $media->where('custom_properties.scope', 'cover'))
                ->image()
                ->openable()
                ->downloadable()
                ->columnSpanFull(),
        ];
    }
}
