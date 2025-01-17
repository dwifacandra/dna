<?php

namespace App\Core\Clusters\Resumes\Resources\ExperienceResource\Forms;


use App\Models\GeoLocations\{Province, Regency};
use App\Core\{Enums, Clusters\Resumes\Resources\CompanyResource\Forms};
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\{Hidden, Select, Fieldset, TextInput, DatePicker, MarkdownEditor};

class ExperienceFormSchemes
{
    public static function getOptions(): array
    {
        return [
            Hidden::make('user_id')->default(Auth::user()->id),
            Fieldset::make('General')
                ->columns(3)
                ->schema([
                    TextInput::make('job_title')
                        ->required()
                        ->label('Job Title'),
                    Select::make('job_type')
                        ->required()
                        ->native(false)
                        ->options(Enums\JobType::class),
                    Select::make('company_id')
                        ->relationship('company', 'name')
                        ->required()
                        ->native(false)
                        ->manageOptionForm(Forms\CompanyFormSchemes::getOptions())
                ]),
            Fieldset::make('Location')
                ->schema([
                    Select::make('country')
                        ->options([
                            'Indonesia' => 'Indonesia',
                            'Malaysia' => 'Malaysia',
                            'Singapore' => 'Singapore',
                            'Thailand' => 'Thailand',
                            'Philippines' => 'Philippines',
                            'Vietnam' => 'Vietnam',
                            'Myanmar' => 'Myanmar',
                            'Cambodia' => 'Cambodia',
                            'Laos' => 'Laos',
                            'Brunei' => 'Brunei',
                            'East Timor' => 'East Timor'
                        ])
                        ->required()
                        ->default('Indonesia')
                        ->reactive()
                        ->native(false),
                    Select::make('province')
                        ->required()
                        ->reactive()
                        ->native(false)
                        ->searchable()
                        ->disabled(fn(callable $get) => empty($get('country')))
                        ->options(Province::all()->pluck('name', 'alt_name')),
                    Select::make('regency')
                        ->required()
                        ->reactive()
                        ->native(false)
                        ->searchable()
                        ->disabled(fn(callable $get) => empty($get('province')))
                        ->options(function (callable $get) {
                            $province = Province::where('alt_name', 'like', '%' . $get('province') . '%')->first()->id ?? null;
                            return Regency::where('province_id', $province)->pluck('name', 'alt_name');
                        }),
                    Select::make('location_type')
                        ->required()
                        ->native(false)
                        ->options(Enums\LocationType::class)
                        ->default(Enums\LocationType::OnSite),
                ]),
            Fieldset::make('Date')
                ->schema([
                    DatePicker::make('start_date')
                        ->required()
                        ->default(today()),
                    DatePicker::make('end_date'),
                ]),
            MarkdownEditor::make('description')->columnSpanFull(),
        ];
    }
}
