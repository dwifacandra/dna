<?php

namespace App\Core\Clusters\Resumes\Resources\CompanyResource\Forms;

use Filament\Forms\Components\{TextInput, FileUpload, MarkdownEditor};

class CompanyFormSchemes
{
    public static function getOPtions(): array
    {
        return [
            TextInput::make('name')
                ->required(),
            TextInput::make('url')
                ->url()
                ->suffixIcon('heroicon-m-globe-alt'),
            MarkdownEditor::make('description')
                ->columnSpanFull(),
            FileUpload::make('logo')
                ->columnSpanFull()
                ->required()
                ->label('Company Logo')
                ->disk('public')
                ->directory('resumes/company/logo')
                ->acceptedFileTypes(['image/svg+xml'])
                ->nullable(),
        ];
    }
}
