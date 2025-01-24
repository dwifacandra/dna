<?php

namespace App\Models;

use App\Core\Casts\CurrencyCast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Core\Enums\{ProjectStatus, ProjectPriority};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Project extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'name',
        'description',
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

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('projects')
            ->useFallbackUrl('/img/image.svg')
            ->useFallbackPath(public_path('/img/image.svg'))
            ->useDisk('public')
            ->singleFile();
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
