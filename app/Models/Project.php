<?php

namespace App\Models;

use App\Core\Casts\CurrencyCast;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Core\Enums\{ProjectStatus, ProjectPriority};
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'url',
        'repository',
        'start_date',
        'end_date',
        'status',
        'priority',
        'budget',
        'publish_to_portfolio',
        'thumbnail',
        'user_id',
        'customer_id',
        'category_id',
    ];

    protected $casts = [
        'status' => ProjectStatus::class,
        'priority' => ProjectPriority::class,
        'budget' => CurrencyCast::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function category()
    {
        return $this->belongsTo(ProjectCategory::class);
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
        return $query->where('publish_to_portfolio', 1)->count();
    }
}
