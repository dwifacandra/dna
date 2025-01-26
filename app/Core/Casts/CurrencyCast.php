<?php

namespace App\Core\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use NumberFormatter;

class CurrencyCast implements CastsAttributes
{
    public function get($model, string $key, $value, array $attributes)
    {
        $currencyCode = config('currency.currency_code');
        $locale = config('currency.locale');
        $symbol = config('currency.symbol');
        $formatter = new NumberFormatter($locale, NumberFormatter::CURRENCY);
        $formatter->setAttribute(NumberFormatter::FRACTION_DIGITS, 0);
        $formatter->setSymbol(NumberFormatter::CURRENCY_SYMBOL, $symbol);
        return $formatter->formatCurrency($value, $currencyCode);
    }
    public function set($model, string $key, $value, array $attributes)
    {
        return preg_replace('/[^\d.-]/', '', $value);
    }
}
