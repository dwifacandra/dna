<?php

namespace App\Core\Enums;

use Filament\Support\Contracts\{HasLabel, HasColor};

enum CashFlow: string implements HasLabel, HasColor
{
    case Income = 'income';
    case Expense = 'expense';
    case Transfer = 'transfer';

    public function getLabel(): string
    {
        return match ($this) {
            self::Income => 'Income',
            self::Expense => 'Expense',
            self::Transfer => 'Transfer',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::Income => 'success',
            self::Expense => 'danger',
            self::Transfer => 'info',
        };
    }
}
