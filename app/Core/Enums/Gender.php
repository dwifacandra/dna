<?php

namespace App\Core\Enums;

use Filament\Support\Contracts\{HasLabel, HasColor};

enum Gender: string implements HasLabel, HasColor
{
    case Male = 'male';
    case Female = 'female';
    public function getLabel(): string
    {
        return match ($this) {
            self::Male => 'Male',
            self::Female => 'Female',
        };
    }
    public function getColor(): string
    {
        return match ($this) {
            self::Male => 'emerald',
            self::Female => 'rose',
        };
    }
}
