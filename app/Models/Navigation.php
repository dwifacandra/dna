<?php

namespace App\Models;

use App\Core\Enums\{NavigationPosition, IconNavigationPosition};
use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
    protected $fillable = [
        'label',
        'url',
        'icon',
        'icon_position',
        'position',
        'icon_only',
        'active',
    ];

    protected $casts = [
        'icon_position' => IconNavigationPosition::class,
        'position' => NavigationPosition::class,
    ];

    public function scopeTopNavigations($query)
    {
        return $query->where('position', 'topbar');
    }
}
