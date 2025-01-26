<?php

namespace App\Models\GeoLocations;

use Sushi\Sushi;
use Illuminate\{Database\Eloquent\Model, Support\Str};

class Province extends Model
{
    use Sushi;
    protected $fillable = [
        'id',
        'name',
        'alt_name',
        'latitude',
        'longitude'
    ];
    public function getRows()
    {
        $json = file_get_contents(resource_path('json/provinces.json'));
        $rows = json_decode($json, true);
        foreach ($rows as &$row) {
            $row['name'] = Str::title($row['name']);
            $row['alt_name'] = Str::title($row['alt_name']);
        }
        return $rows;
    }
    public function regencies()
    {
        return $this->hasMany(Regency::class);
    }
}
