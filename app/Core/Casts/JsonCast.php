<?php

namespace App\Core\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class JsonCast implements CastsAttributes
{
    public function get($model, string $key, $value, array $attributes)
    {
        return json_decode($value, true);
    }
    public function set($model, string $key, $value, array $attributes)
    {
        return json_encode($value);
    }
}
