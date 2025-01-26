<?php

namespace App\Core\Enums;

use Filament\Support\Contracts\{HasLabel, HasColor};

enum ProjectStatus: string implements HasLabel, HasColor
{
    case Pending = 'pending';
    case Backlog = 'backlog';
    case InReview = 'in_review';
    case InProgress = 'in_progress';
    case Ready = 'ready';
    case Done = 'done';
    public function getLabel(): string
    {
        return match ($this) {
            self::Pending => 'Pending',
            self::Backlog => 'Backlog',
            self::InReview => 'In Review',
            self::InProgress => 'In Progress',
            self::Ready => 'Ready',
            self::Done => 'Done',
        };
    }
    public function getColor(): string
    {
        return match ($this) {
            self::Pending => 'primary',
            self::Backlog => 'danger',
            self::InReview => 'warning',
            self::InProgress => 'warning',
            self::Ready => 'info',
            self::Done => 'success',
        };
    }
}
