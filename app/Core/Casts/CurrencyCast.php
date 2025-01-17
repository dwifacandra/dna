<?php

namespace App\Core\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use NumberFormatter;

class CurrencyCast implements CastsAttributes
{
    public function get($model, string $key, $value, array $attributes)
    {
        // Mengambil konfigurasi
        $currencyCode = config('currency.currency_code');
        $locale = config('currency.locale');
        $symbol = config('currency.symbol');

        // Format nilai menjadi mata uang dengan 0 decimal
        $formatter = new NumberFormatter($locale, NumberFormatter::CURRENCY);
        $formatter->setAttribute(NumberFormatter::FRACTION_DIGITS, 0); // Set 0 decimal
        $formatter->setSymbol(NumberFormatter::CURRENCY_SYMBOL, $symbol);

        return $formatter->formatCurrency($value, $currencyCode);
    }

    public function set($model, string $key, $value, array $attributes)
    {
        // Mengubah nilai kembali ke format numerik
        // Anda mungkin perlu menyesuaikan ini sesuai dengan format yang Anda terima
        return preg_replace('/[^\d.-]/', '', $value); // Menghapus simbol dan karakter non-numerik
    }
}
