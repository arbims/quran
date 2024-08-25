<?php

namespace App\Service;

use Cake\Utility\Text;

class SlugGenerator {

  public function __construct(protected string $slug)
  {}

  public function slugify()
  {
    dd(Text::slug($this->slug));
  }
}