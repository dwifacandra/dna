<?php

namespace App\Models;

use App\Core\Enums\Rate;
use App\Core\Helpers\CoreIcon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\{Factories\HasFactory, Model};

class ResumeSkill extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'category_id',
        'name',
        'rating',
        'icon',
    ];
    protected $casts = [
        'rating' => Rate::class,
    ];
    protected static function booted()
    {
        static::saved(function ($model) {
            Cache::forget('logo_' . $model->id);
        });
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
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
}
