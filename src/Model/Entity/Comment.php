<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Comment Entity
 *
 * @property int $id
 * @property int $post_id
 * @property string $author_name
 * @property string $author_email
 * @property string|null $author_website
 * @property string $body
 * @property bool $is_approved
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\Post $post
 */
class Comment extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'post_id' => true,
        'author_name' => true,
        'author_email' => true,
        'author_website' => true,
        'body' => true,
        'is_approved' => true,
        'created' => true,
        'modified' => true,
        'post' => true,
    ];
}
