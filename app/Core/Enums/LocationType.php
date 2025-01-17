<?php

namespace App\Core\Enums;

use Filament\Support\Contracts\{HasLabel, HasColor};

enum LocationType: string implements HasLabel, HasColor
{
    case OnSite = 'On Site';
    case Remote = 'Remote';
    case Hybrid = 'Hybrid';

    public function getColor(): string
    {
        return match ($this) {
            self::OnSite => 'success',
            self::Remote => 'info',
            self::Hybrid => 'warning',
        };
    }

    public function getLabel(): string
    {
        return match ($this) {
            self::OnSite => 'On Site',
            self::Remote => 'Remote',
            self::Hybrid => 'Hybrid',
        };
    }
}
