<?php

namespace App\Core\Enums;

use Filament\Support\Contracts\{HasColor, HasLabel, HasIcon};

enum Locale: string implements HasLabel, HasIcon, HasColor
{
    case EN = 'en';
    case ID = 'id';
    public function getLabel(): string
    {
        return match ($this) {
            self::EN => 'EN',
            self::ID => 'ID',
        };
    }
    public function getIcon(): string
    {
        return match ($this) {
            self::EN => 'flags.4x3.en',
            self::ID => 'flags.4x3.id',
        };
    }
    public function getColor(): string
    {
        return match ($this) {
            self::EN => 'emerald',
            self::ID => 'rose',
        };
    }
}
