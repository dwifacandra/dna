<?php

namespace App\Models;

use App\Core\Enums\CollectionStatus;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\{HasMedia, InteractsWithMedia};

class Collection extends Model implements HasMedia
{
    use InteractsWithMedia;
    protected $fillable = [
        'scope',
        'title',
        'slug',
        'status',
        'description',
        'category_id',
        'author_id',
        'tags',
        'keywords',
        'source',
        'source_url',
    ];
    protected $casts = [
        'status' => CollectionStatus::class,
        'tags' => 'array',
        'keywords' => 'array',
    ];
    public function generateSlug()
    {
        $this->slug = Str::slug($this->title);
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
        $this->addMediaCollection('collections')
            ->useFallbackUrl('/svg/core.color.no_image');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
