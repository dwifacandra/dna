<?php

namespace App\Core\Clusters\Products\Resources\ProjectResource\Forms;

use App\Models\Project;
use Filament\Support\RawJs;
use App\Core\Enums\{ProjectStatus, ProjectPriority};
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use App\Core\Clusters\Products\Resources\ProjectCategoryResource\Forms\ProjectCategoryFormSchemes;
use Filament\Forms\Components\{TextInput, Fieldset, DatePicker, FileUpload, Toggle, MarkdownEditor, Select};

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
                        ->relationship('category', 'name')
                        ->manageOptionForm(ProjectCategoryFormSchemes::getOptions())
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
            SpatieMediaLibraryFileUpload::make('thumbnail')
                ->columnSpanFull()
                ->disk('public')
                ->collection('projects')
                ->image()
                ->imageEditor()
                ->openable()
                ->downloadable()
                ->nullable(),
            MarkdownEditor::make('description')->columnSpanFull(),
        ];
    }
}
