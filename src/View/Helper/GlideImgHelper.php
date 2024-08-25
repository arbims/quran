<?php

namespace App\View\Helper;

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\View\Helper;
use League\Glide\Urls\UrlBuilderFactory;

class GlideImgHelper extends Helper {


    public function generate(string $path, int $width, int $height) {
        $signature = Configure::read('GLIDE_KEY');
        $urlBuilder = UrlBuilderFactory::create('/images/', $signature);
        return $urlBuilder->getUrl($path, ['w' => $width, 'h' => $height, 'fit' => 'crop']);
    }
}
