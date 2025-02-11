<?php

namespace App\Core\Enums;

use Filament\Support\Contracts\{HasLabel, HasColor};

enum Rate: int implements HasLabel, HasColor
{
    case ONE = 1;
    case TWO = 2;
    case THREE = 3;
    case FOUR = 4;
    case FIVE = 5;
    public function getLabel(): string
    {
        return match ($this) {
            self::ONE => 'Novice',
            self::TWO => 'Competent',
            self::THREE => 'Proficient',
            self::FOUR => 'Expert',
            self::FIVE => 'Master',
        };
    }
    public function getColor(): string
    {
        return match ($this) {
            self::ONE => 'danger',
            self::TWO => 'warning',
            self::THREE => 'warning',
            self::FOUR => 'success',
            self::FIVE => 'success',
        };
    }
}
