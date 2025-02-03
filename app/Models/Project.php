<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Core\Casts\CurrencyCast;
use App\Core\Enums\{ProjectStatus, ProjectPriority};
use Spatie\MediaLibrary\{HasMedia, InteractsWithMedia, MediaCollections\Models\Media};
use Illuminate\Database\Eloquent\{Model, Builder, Factories\HasFactory};

class Project extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'name',
        'description',
        'slug',
        'url',
        'repository',
        'start_date',
        'end_date',
        'status',
        'priority',
        'price',
        'release',
        'featured',
        'user_id',
        'category_id',
    ];
    protected $casts = [
        'status' => ProjectStatus::class,
        'priority' => ProjectPriority::class,
        'price' => CurrencyCast::class,
    ];
    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }
    public static function boot()
    {
        parent::boot();
        static::creating(function ($post) {
            $post->generateSlug();
        });
        static::updating(function ($post) {
            $post->generateSlug();
        });
    }
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('projects')
            ->useFallbackUrl('/svg/core.color.image')
            ->useDisk('public');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function scopeCountByStatus(Builder $query, $statuses)
    {
        if (is_string($statuses)) {
            $statuses = [$statuses];
        }
        return $query->whereIn('status', $statuses)->count();
    }
    public function scopePercentageByStatus(Builder $query, ProjectStatus $status)
    {
        $totalCount = $query->count();
        $statusCount = $query->countByStatus($status);
        $percentage = ($totalCount === 0) ? 0 : ($statusCount / $totalCount) * 100;
        return number_format($percentage, 2) . '%';
    }
    public function scopeCountPortfolio(Builder $query)
    {
        return $query->where('release', 1)->count();
    }
}
