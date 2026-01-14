<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Blog Entity
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string $slug
 * @property int $user_id
 * @property \Cake\I18n\DateTime $created
 * @property \Cake\I18n\DateTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Post[] $posts
 * @property \App\Model\Entity\Domain[] $domains
 */
class Blog extends Entity implements DomainInterface
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
    protected array $_accessible = [
        'title' => true,
        'description' => true,
        'slug' => true,
        'user_id' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'posts' => true,
        'domains' => true,
    ];

    public function getDomains(): array
    {
        return $this->domains ?? [];
    }
}
