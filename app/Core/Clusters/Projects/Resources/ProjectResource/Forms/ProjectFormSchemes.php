<?php

namespace App\Core\Clusters\Projects\Resources\ProjectResource\Forms;

use Filament\Support\RawJs;
use App\Core\Enums\{ProjectStatus, ProjectPriority};
use App\Core\Clusters\Projects\Resources\ProjectCategoryResource\Forms\ProjectCategoryFormSchemes;
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
                    TextInput::make('budget')
                        ->mask(RawJs::make('$money($input, \',\')'))
                        ->stripCharacters('.')
                        ->prefix('Rp')
                        ->numeric()
                        ->required()
                        ->minLength(5)
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
                    Toggle::make('publish_to_portfolio')
                        ->required()
                        ->label('Publish to Portfolio'),
                ])->columns(3),
            Fieldset::make('Sources')
                ->schema([
                    TextInput::make('url'),
                    TextInput::make('repository'),
                ]),
            Fieldset::make('Assignee')
                ->schema([
                    Select::make('user_id')
                        ->relationship('user', 'name')
                        ->required()
                        ->native(false),
                    Select::make('customer_id')
                        ->relationship('customer', 'name')
                        ->required()
                        ->native(false),
                ]),
            Fieldset::make('Date')
                ->schema([
                    DatePicker::make('start_date')
                        ->required()
                        ->default(today()),
                    DatePicker::make('end_date'),
                ]),
            FileUpload::make('thumbnail')
                ->columnSpanFull()
                ->disk('public')
                ->directory('projects/thumbnail')
                ->image()
                ->imageEditor()
                ->openable()
                ->downloadable()
                ->nullable(),
            MarkdownEditor::make('description')->columnSpanFull(),
        ];
    }
}
