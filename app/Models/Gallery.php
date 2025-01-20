<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image_path',
        'image_type',
        'slug',
        'alt',
    ];

    public function setAltAttribute($value)
    {
        $this->attributes['alt'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
