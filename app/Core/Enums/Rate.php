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
    case SIX = 6;
    case SEVEN = 7;
    case EIGHT = 8;
    case NINE = 9;
    case TEN = 10;

    public function getLabel(): string
    {
        return (string) $this->value;
    }

    public function getColor(): string
    {
        return match ($this) {
            self::ONE => 'danger',
            self::TWO => 'danger',
            self::THREE => 'danger',
            self::FOUR => 'warning',
            self::FIVE => 'warning',
            self::SIX => 'warning',
            self::SEVEN => 'warning',
            self::EIGHT => 'success',
            self::NINE => 'success',
            self::TEN => 'success',
        };
    }

    public function getColorHex(): string
    {
        return match ($this) {
            self::ONE, self::TWO, self::THREE => '#dc2626', // Merah (danger)
            self::FOUR, self::FIVE, self::SIX, self::SEVEN => '#ea580c', // Oranye (warning)
            self::EIGHT, self::NINE, self::TEN => '#16a34a', // Hijau (success)
        };
    }
}
