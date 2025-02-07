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
        if (is_null($media->custom_properties) || !is_array($media->custom_properties) || empty($media->custom_properties)) {
            return "{$media->collection_name}/{$media->id}/";
        } else {
            $customProperties = array_values($media->custom_properties);
            return "{$media->collection_name}/{$customProperties[0]}/{$media->id}/";
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
