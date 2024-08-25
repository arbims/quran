<?php

namespace App\Service;

use League\Glide\Urls\UrlBuilder;
use League\Glide\Urls\UrlBuilderFactory;

class ImagePathGenerator
{    
    /**
     * generate
     *
     * @param  mixed $path
     * @param  mixed $width
     * @param  mixed $height
     * @return void
     */
    public function generate(string $path, int $width, int $height): ?UrlBuilder {
        $urlBuilder = UrlBuilderFactory::create('/images/');
        return $urlBuilder->getUrl($path, ['w' => $width, 'h' => $height, 'fit' => 'crop']);
    }
}
