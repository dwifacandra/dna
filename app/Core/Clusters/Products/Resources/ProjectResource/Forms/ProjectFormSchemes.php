<?php

namespace App\Core\Clusters\Products\Resources\ProjectResource\Forms;

use Filament\Support\RawJs;
use App\Core\Traits\Categories;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;
use App\Core\Enums\{ProjectStatus, ProjectPriority};
use Filament\Forms\Components\{TextInput, Fieldset, DatePicker, Toggle, RichEditor, Select, SpatieMediaLibraryFileUpload};

class ProjectFormSchemes
{
    public static function getOptions(): array
    {
        return [
            Fieldset::make()
                ->schema([
                    TextInput::make('name')
                        ->required(),
                    TextInput::make('price')
                        ->mask(RawJs::make('$money($input, \',\')'))
                        ->stripCharacters('.')
                        ->prefix('Rp')
                        ->numeric()
                        ->required()
                        ->minLength(1)
                        ->maxLength(10),
                ]),
            Fieldset::make()
                ->schema([
                    Select::make('category_id')
                        ->relationship(
                            name: 'category',
                            titleAttribute: 'name',
                            modifyQueryUsing: fn(Builder $query) => $query->where('scope', 'project'),
                        )
                        ->manageOptionForm(Categories::getFormSchemes('project'))
                        ->required()
                        ->native(false),
                    Select::make('priority')
                        ->options(ProjectPriority::class)
                        ->required()
                        ->native(false),
                    Select::make('status')
                        ->options(ProjectStatus::class)
                        ->required()
                        ->native(false),
                ])->columns(3),
            Fieldset::make('Sources')
                ->schema([
                    TextInput::make('url'),
                    TextInput::make('repository'),
                ]),
            Fieldset::make('Assignee')
                ->schema([
                    Select::make('user_id')
                        ->label('Programmer')
                        ->relationship('user', 'name')
                        ->required()
                        ->native(false),
                    Toggle::make('featured')
                        ->required(),
                    Toggle::make('release')
                        ->required(),
                ])->columns(1),
            Fieldset::make('Date')
                ->schema([
                    DatePicker::make('start_date')
                        ->required()
                        ->default(today()),
                    DatePicker::make('end_date'),
                ]),
            Fieldset::make('Upload')
                ->schema([
                    SpatieMediaLibraryFileUpload::make('cover')
                        ->disk('public')
                        ->collection('projects')
                        ->customProperties(['scope' => 'cover'])
                        ->filterMediaUsing(fn(Collection $media): Collection => $media->where('custom_properties.scope', 'cover'))
                        ->image()
                        ->imageEditor()
                        ->openable()
                        ->downloadable()
                        ->nullable(),
                    SpatieMediaLibraryFileUpload::make('preview')
                        ->disk('public')
                        ->collection('projects')
                        ->customProperties(['scope' => 'preview'])
                        ->filterMediaUsing(fn(Collection $media): Collection => $media->where('custom_properties.scope', 'preview'))
                        ->image()
                        ->imageEditor()
                        ->openable()
                        ->downloadable()
                        ->nullable()
                        ->multiple(),
                ])->columns(2),
            RichEditor::make('description')->columnSpanFull(),
        ];
    }
}
