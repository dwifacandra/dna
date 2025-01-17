<?php

namespace App\Core\Clusters\Resumes\Resources\CompanyResource\Tables;

use App\Models\ResumeCompany;
use Filament\Tables\Columns\{Layout\Split, Layout\Stack, ImageColumn, TextColumn};

class CompanyTableColumns
{
    public static function getOptions(): array
    {
        return [
            Split::make([
                Stack::make([
                    ImageColumn::make('logo')
                        ->alignment('center')
                        ->disk('public')
                        ->visibility('private')
                        ->width(150)
                        ->height('auto')
                        ->extraImgAttributes(fn(ResumeCompany $record): array => [
                            'alt' => "{$record->name} logo",
                            'class' => 'px-8 py-4',
                        ]),
                    TextColumn::make('url')
                        ->alignment('center')
                        ->size('sm')
                        ->url(
                            fn(ResumeCompany $record): string =>
                            $record->url ?? '',
                            shouldOpenInNewTab: true
                        ),
                ]),
                Stack::make([
                    TextColumn::make('name')
                        ->weight('semibold')
                        ->extraAttributes([
                            'class' => 'pt-4'
                        ]),
                    TextColumn::make('description')->lineClamp(2)->html(),
                ]),
            ]),
        ];
    }
}
