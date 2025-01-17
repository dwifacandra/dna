<?php

namespace App\Models;

use App\Core\Enums\Rate;
use App\Helpers\IconSVG;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ResumeSkill extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'rate',
        'icon',
        'icon_color',
    ];
    protected $casts = [
        'rate' => Rate::class,
    ];

    protected static function booted()
    {
        static::saved(function ($model) {
            Cache::forget('logo_' . $model->id);
        });
    }

    // public function getLogoAttribute()
    // {
    //     $cacheKey = 'logo_' . $this->id;
    //     return Cache::remember($cacheKey, 60 * 24, function () {
    //         $cleanedName = preg_replace('/[^a-zA-Z0-9\s]/', '', $this->name);
    //         $firstWord = Str::lower(explode(' ', $cleanedName)[0]);
    //         $secondWord = Str::lower(explode(' ', $cleanedName)[1] ?? '');
    //         $icon = IconSVG::get($firstWord);
    //         if (!str_contains($icon, '<x-icon-checklist/>')) {
    //             $icon = IconSVG::get($firstWord . $secondWord);
    //         }
    //         return $icon;
    //     });
    // }

    public function setRateAttribute($value)
    {
        $this->attributes['rate'] = $value ?? 1;
    }

    public function getRateIntAttribute()
    {
        return (int) $this->rate->value;
    }

    public function getPercentageAttribute()
    {
        return ($this->rateInt / 10) * 100;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
