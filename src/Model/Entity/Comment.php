<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Utility\Security;

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

    /**
     * Fields excluded from JSON serialization.
     *
     * @var array<string>
     */
    protected array $_hidden = [
        'author_email',
    ];

    /**
     * Get the encryption key (first 32 bytes of Security salt).
     */
    protected static function _encryptionKey(): string
    {
        return substr(Security::getSalt(), 0, 32);
    }

    /**
     * Mutator: encrypt the email before saving to the database.
     */
    protected function _setAuthorEmail(?string $email): ?string
    {
        if ($email === null || $email === '') {
            return null;
        }

        $encrypted = Security::encrypt($email, static::_encryptionKey());

        return base64_encode($encrypted);
    }

    /**
     * Decrypt the stored email. Returns null if empty or decryption fails.
     */
    public function getDecryptedEmail(): ?string
    {
        // Read the raw field value (bypasses any virtual field)
        $raw = $this->_fields['author_email'] ?? null;

        if ($raw === null || $raw === '') {
            return null;
        }

        $decoded = base64_decode($raw, true);
        if ($decoded === false) {
            return null;
        }

        $decrypted = Security::decrypt($decoded, static::_encryptionKey());

        return $decrypted === false ? null : $decrypted;
    }
}
