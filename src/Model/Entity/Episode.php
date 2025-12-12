<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use OpenApi\Attributes as OA;

/**
 * Episode Entity
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string|null $youtube
 * @property string $description
 * @property int $online
 * @property int $program_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Program $program
 */
#[OA\Schema(
    schema: 'FormEpisode',
    properties: [
        new OA\Property(
            property: 'title',
            type: 'string',
            example: 'My Episode Title'
        ),
        new OA\Property(
            property: 'slug',
            type: 'string',
            example: 'my-episode-title'
        ),
        new OA\Property(
            property: 'youtube',
            type: 'string',
            example: 'https://www.youtube.com/watch?v=xxxxxxx',
            nullable: true
        ),
        new OA\Property(
            property: 'description',
            type: 'string',
            example: 'A short description of the episode.'
        ),
        new OA\Property(
            property: 'online',
            type: 'integer',
            example: 1
        ),
        new OA\Property(
            property: 'program_id',
            type: 'integer',
            example: 12
        )
    ]
)]
class Episode extends Entity
{
    protected array $_accessible = [
        'title' => true,
        'slug' => true,
        'youtube' => true,
        'description' => true,
        'online' => true,
        'program_id' => true,
        'created' => true,
        'modified' => true,
        'program' => true,
    ];
}
