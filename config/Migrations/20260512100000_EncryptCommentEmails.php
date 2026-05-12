<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class EncryptCommentEmails extends BaseMigration
{
    public function change(): void
    {
        $table = $this->table('comments');
        $table->changeColumn('author_email', 'string', [
            'limit' => 512,
            'null' => true,
            'default' => null,
        ]);
        $table->update();
    }
}
