<?php

namespace App\Core\Enums;

use Filament\Support\Contracts\{HasColor, HasLabel, HasIcon};

enum CollectionStatus: string implements HasLabel, HasIcon, HasColor
{
    case DRAFT = 'draft';
    case PUBLISH = 'publish';
    public function getLabel(): string
    {
        return match ($this) {
            self::DRAFT => 'Draft',
            self::PUBLISH => 'Publish',
        };
    }
    public function getColor(): string
    {
        return match ($this) {
            self::DRAFT => 'danger',
            self::PUBLISH => 'success',
        };
    }
    public function getIcon(): string
    {
        return match ($this) {
            self::DRAFT => 'core.outline.lock',
            self::PUBLISH => 'core.outline.public',
        };
    }
}
