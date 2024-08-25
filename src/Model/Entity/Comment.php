<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Comment Entity
 *
 * @property int $id
 * @property string|null $username
 * @property string|null $email
 * @property string|null $content
 * @property int|null $commentable_id
 * @property string $commentable_type
 * @property int $reply
 * @property string $ip
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 */
class Comment extends Entity
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
        'username' => true,
        'email' => true,
        'content' => true,
        'commentable_id' => true,
        'commentable_type' => true,
        'reply' => true,
        'ip' => true,
        'created' => true,
        'modified' => true,
    ];
}
