<?php

namespace App\Core\Clusters\Resumes\Resources\CompanyResource\Tables;

use App\Models\ResumeCompany;
use Illuminate\Support\{Str, Collection};
use Filament\Tables\Columns\{Layout\Split, Layout\Stack, ImageColumn, TextColumn, SpatieMediaLibraryImageColumn};

class CompanyTableColumns
{
    public static function getOptions(): array
    {
        return [
            Stack::make([
                SpatieMediaLibraryImageColumn::make('logo')
                    ->collection('companies')
                    ->filterMediaUsing(fn(Collection $media): Collection => $media->where('custom_properties.scope', 'logo'))
                    ->alignment('center')
                    ->size(180)
                    ->extraImgAttributes(fn(ResumeCompany $record): array => [
                        'alt' => "{$record->name} logo",
                        'class' => 'object-contain',
                    ]),
            ]),
            Stack::make([
                TextColumn::make('name')
                    ->weight('semibold')
                    ->extraAttributes([
                        'class' => 'pt-4'
                    ]),
                TextColumn::make('url')
                    ->size('sm')
                    ->lineClamp(1)
                    ->url(
                        fn(ResumeCompany $record): string =>
                        $record->url ?? '',
                        shouldOpenInNewTab: true
                    ),
                TextColumn::make('description')->lineClamp(2)->html(),
            ]),
        ];
    }
}
