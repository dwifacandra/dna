<?php

namespace App\Models\GeoLocations;

use Sushi\Sushi;
use Illuminate\{Database\Eloquent\Model, Support\Str};

class Regency extends Model
{
    use Sushi;
    protected $fillable =
    [
        'id',
        'province_id',
        'name',
        'alt_name',
        'latitude',
        'longitude'
    ];
    public function getRows()
    {
        $json = file_get_contents(resource_path('json/regencies.json'));
        $rows = json_decode($json, true);
        foreach ($rows as &$row) {
            $row['name'] = Str::title($row['name']);
            $row['alt_name'] = Str::title($row['alt_name']);
        }
        return $rows;
    }
    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}
