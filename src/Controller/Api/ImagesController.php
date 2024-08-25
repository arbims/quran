<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Response;
use League\Glide\Server;
use League\Glide\ServerFactory;
use League\Glide\Signatures\SignatureFactory;

class ImagesController extends AppController
{

  /**
   * show
   *
   * @param  mixed $path
   * @return Response
   */
  public function show(string $path): ?Response
  {
    $server = ServerFactory::create([
      'source' => WWW_ROOT . 'img',
      'cache' => WWW_ROOT . '.cache',
      'cache_prefix' => '.cache',
      'base_url' => 'images',
    ]);
    SignatureFactory::create(Configure::read('GLIDE_KEY'))->validateRequest($this->request->getPath(), $this->request->getQueryParams());
    return $server->outputImage($path, $this->request->getQueryParams());
  }
}
