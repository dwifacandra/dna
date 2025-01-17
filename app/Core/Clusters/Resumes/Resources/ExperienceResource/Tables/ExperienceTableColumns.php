<?php

namespace App\Core\Clusters\Resumes\Resources\ExperienceResource\Tables;

use Illuminate\Support\Str;
use Filament\{Support\Enums\Alignment, Tables\Columns\TextColumn};

class ExperienceTableColumns
{
    public static function getOptions(): array
    {
        return [
            TextColumn::make('job_title')
                ->label('Job Title')
                ->description(
                    fn($record) => Str::limit(strip_tags(
                        $record->description
                    ), 50)
                ),
            TextColumn::make('job_type')
                ->label('Job Type')
                ->badge()
                ->alignment(Alignment::Center),
            TextColumn::make('company.name')
                ->label('Company Name')
                ->badge()
                ->alignment(Alignment::Center),
            TextColumn::make('location_type')
                ->label('Location Type')
                ->badge()
                ->alignment(Alignment::Center),
            TextColumn::make('location'),
            TextColumn::make('experience_duration.duration')
                ->label('Experience'),
            TextColumn::make('start_date')
                ->label('Start Date')
                ->date('d/m/Y')
                ->alignment(Alignment::Center),
            TextColumn::make('end_date')
                ->label('End Date')
                ->date('d/m/Y')
                ->alignment(Alignment::Center),
        ];
    }
}
