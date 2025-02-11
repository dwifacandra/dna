<?php

namespace App\Core\Clusters\Resumes\Resources\SkillResource\Forms;

use Filament\Forms\Get;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use App\Core\{Enums\Rate, Helpers\CoreIcon, Traits\Categories};
use Filament\Forms\Components\{TextInput, Hidden, Select,  ToggleButtons};

class SkillFormSchemes
{
    public static function getOptions(): array
    {
        return [
            Hidden::make('user_id')->default(Auth::user()->id),
            TextInput::make('name')->required(),
            Select::make('category_id')
                ->relationship(
                    name: 'category',
                    titleAttribute: 'name',
                    modifyQueryUsing: fn(Builder $query) => $query->where('scope', 'resume_skill'),
                )
                ->manageOptionForm(Categories::getFormSchemes('resume_skill'))
                ->native(false)
                ->searchable()
                ->required()
                ->preload(),
            ToggleButtons::make('rating')
                ->inline()
                ->options(Rate::class),
            Select::make('icon')
                ->label('Select Icon')
                ->native(false)
                ->searchable()
                ->reactive()
                ->required()
                ->options(CoreIcon::getIcons())
                ->prefixIcon(function (Get $get): string {
                    return $get('icon') ?: 'core.outline.fonticons';
                })
        ];
    }
}
