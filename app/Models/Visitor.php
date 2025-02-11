<?php

namespace App\Models;

use App\Core\Casts\JsonCast;
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
        'page_visited' => JsonCast::class,
    ];
    public function getBrowserAttribute(): ?string
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
    public function getOSAttribute(): ?string
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
    public function getPageUrlAttribute(): ?string
    {
        return $this->page_visited['page_url'] ?? null;
    }
    public function getPagePathAttribute(): ?string
    {
        return $this->page_visited['page_path'] ?? null;
    }
    public function getPageRefererAttribute(): ?string
    {
        return $this->page_visited['page_referer'] ?? null;
    }
    public function getRouteNameAttribute(): ?string
    {
        return $this->page_visited['route_name'] ?? null;
    }
    public function getRouteQueryAttribute(): ?array
    {
        return $this->page_visited['route_query'] ?? null;
    }
    public function getUserNameAttribute(): ?string
    {
        return $this->page_visited['user_name'] ?? null;
    }
}
