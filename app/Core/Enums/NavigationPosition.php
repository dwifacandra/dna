<?php

namespace App\Core\Enums;

use Filament\Support\Contracts\{HasLabel};

enum NavigationPosition: string implements HasLabel
{
    case Top = 'topbar';
    case Aside = 'sidebar';

    public function getLabel(): string
    {
        return match ($this) {
            self::Top => 'Top Navigation',
            self::Aside => 'Sidebar Navigation',
        };
    }
}
