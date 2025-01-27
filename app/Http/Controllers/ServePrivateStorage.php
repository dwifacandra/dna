<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Storage;

class ServePrivateStorage extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Spatie\MediaLibrary\MediaCollections\Models\Media $media
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Media $media)
    {
        // $this->authorize('view', $media->model);

        return $media;
    }
}
