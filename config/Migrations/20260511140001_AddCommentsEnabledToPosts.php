<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class AddCommentsEnabledToPosts extends BaseMigration
{
    public function change(): void
    {
        $table = $this->table('posts');
        $table->addColumn('comments_enabled', 'boolean', [
            'default' => true,
            'null' => false,
        ]);
        $table->update();
    }
}
