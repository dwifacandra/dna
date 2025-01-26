<?php

namespace App\Core\Enums;

use Filament\Support\Contracts\{HasLabel, HasColor};

enum JobType: string implements HasLabel, HasColor
{
    case Permanent = 'Permanent';
    case Contract = 'Contract';
    case Freelance = 'Freelance';
    public function getLabel(): string
    {
        return match ($this) {
            self::Permanent => 'Permanent',
            self::Contract => 'Contract',
            self::Freelance => 'Freelance',
        };
    }
    public function getColor(): string
    {
        return match ($this) {
            self::Permanent => 'success',
            self::Contract => 'info',
            self::Freelance => 'warning',
        };
    }
}
