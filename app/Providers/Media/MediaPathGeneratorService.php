<?php

namespace App\Providers\Media;

use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator;

class MediaPathGeneratorService implements PathGenerator
{
    function getModelName($namespace): string
    {
        return Str::afterLast($namespace, '\\');
    }
    public function getPath(Media $media): string
    {
        if (is_null($media->custom_properties)) {
            return "{$media->collection_name}/{$media->id}/";
        } else {
            return "{$media->collection_name}/" . array_values($media->custom_properties)[0] . "/{$media->id}/";
        }
    }
    public function getPathForConversions(Media $media): string
    {
        return $this->getPath($media) . 'conversions/';
    }
    public function getPathForResponsiveImages(Media $media): string
    {
        return $this->getPath($media) . 'responsive-images/';
    }
}
