<?php

namespace App\Providers\Media;

use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator;

class MediaPathGeneratorService implements PathGenerator
{
    public function getPathForConversions(Media $media): string
    {
        return $this->getPath($media) . 'conversions/';
    }

    public function getPath(Media $media): string
    {
        return "{$media->collection_name}/{$media->id}/";
    }

    public function getPathForResponsiveImages(Media $media): string
    {
        return $this->getPath($media) . 'responsive-images/';
    }

    function getModelName($namespace): string
    {
        return Str::afterLast($namespace, '\\');
    }
}
