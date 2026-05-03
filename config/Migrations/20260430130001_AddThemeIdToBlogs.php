<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class AddThemeIdToBlogs extends BaseMigration
{
    /**
     * Add theme_id foreign key to blogs table.
     *
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('blogs');

        $table->addColumn('theme_id', 'integer', [
            'default' => null,
            'null' => true,
            'comment' => 'FK to themes table',
        ]);

        $table->update();
    }
}
