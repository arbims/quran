<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Utility\Text;

/**
 * Post Entity
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $image
 * @property string $description
 * @property int $online
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Post extends Entity
{
  /**
   * Fields that can be mass assigned using newEntity() or patchEntity().
   *
   * Note that when '*' is set to true, this allows all unspecified fields to
   * be mass assigned. For security purposes, it is advised to set '*' to false
   * (or remove it), and explicitly make individual fields accessible as needed.
   *
   * @var array<string, bool>
   */
  protected $_accessible = [
    'name' => true,
    'slug' => true,
    'description' => true,
    'online' => true,
    'user_id' => true,
    'created' => true,
    'modified' => true,
    'image' => true,
    'image_file' => true,
    'user_id' => true,
  ];

  protected function _setSlug(string $slug)
  {
    return empty($slug) ? Text::slug($this->name) : Text::slug($slug);
  }
}
