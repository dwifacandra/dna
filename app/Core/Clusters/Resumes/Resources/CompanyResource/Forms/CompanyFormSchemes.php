<?php

namespace App\Core\Clusters\Resumes\Resources\CompanyResource\Forms;

use Illuminate\Support\Collection;
use Filament\Forms\Components\{TextInput, SpatieMediaLibraryFileUpload, MarkdownEditor};

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
            SpatieMediaLibraryFileUpload::make('logo')
                ->columnSpanFull()
                ->disk('public')
                ->collection('companies')
                ->customProperties(['scope' => 'logo'])
                ->filterMediaUsing(fn(Collection $media): Collection => $media->where('custom_properties.scope', 'logo'))
                ->image()
                ->imageEditor()
                ->openable()
                ->downloadable()
                ->nullable(),
            MarkdownEditor::make('description')
                ->columnSpanFull(),
        ];
    }
}
