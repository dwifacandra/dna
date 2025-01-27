<?php

namespace App\Providers\Media;

use DateTimeInterface;
use Illuminate\Support\Facades\URL;
use Spatie\MediaLibrary\Support\UrlGenerator\DefaultUrlGenerator;

class MediaUrlGeneratorService extends DefaultUrlGenerator
{
    public function getTemporaryUrl(DateTimeInterface $expiration, array $options = []): string
    {
        return URL::temporarySignedRoute(
            'media',
            $expiration,
            ['media' => $this->media, 'filename' => $this->media]
        );
    }
}
