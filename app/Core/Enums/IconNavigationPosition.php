<?php

namespace App\Core\Enums;

use Filament\Support\Contracts\{HasLabel};

enum IconNavigationPosition: string implements HasLabel
{
    case Start = 'start';
    case End = 'end';
    public function getLabel(): string
    {
        return match ($this) {
            self::Start => 'Start',
            self::End => 'End',
        };
    }
}
