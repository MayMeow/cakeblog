<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class AddCommentsEnabledToBlogs extends BaseMigration
{
    public function change(): void
    {
        $table = $this->table('blogs');
        $table->addColumn('comments_enabled', 'boolean', [
            'default' => true,
            'null' => false,
        ]);
        $table->update();
    }
}
