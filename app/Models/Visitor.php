<?php

namespace App\Models;

use App\Core\Enums\Locale;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable = [
        'ip_address',
        'locale',
        'user_agent',
        'page_visited'
    ];
    protected $casts = [
        'locale' => Locale::class,
        'page_visited' => 'array',
    ];
    public function getBrowserAttribute()
    {
        $userAgent = $this->user_agent;
        if (Str::contains($userAgent, 'Chrome')) {
            return 'Chrome';
        } elseif (Str::contains($userAgent, 'Firefox')) {
            return 'Firefox';
        } elseif (Str::contains($userAgent, 'Safari')) {
            return 'Safari';
        } else {
            return 'Unknown';
        }
    }
    public function getOSAttribute()
    {
        $userAgent = $this->user_agent;

        if (Str::contains($userAgent, 'Windows')) {
            return 'Windows';
        } elseif (Str::contains($userAgent, 'Macintosh')) {
            return 'Mac';
        } elseif (Str::contains($userAgent, 'Linux')) {
            return 'Linux';
        } else {
            return 'Unknown';
        }
    }
    public function getPageUrlAttribute()
    {
        return $this->page_visited['page_url'] ?? null;
    }
    public function getRouteInfoAttribute()
    {
        return [
            'route_name' => $this->page_visited['route_name'] ?? null,
            'route_query' => $this->page_visited['route_query'] ?? [],
        ];
    }
    public function getRouteNameAttribute()
    {
        return $this->page_visited['route_name'] ?? null;
    }
    public function getRouteQueryAttribute()
    {
        return $this->page_visited['route_query'] ?? [];
    }
}
