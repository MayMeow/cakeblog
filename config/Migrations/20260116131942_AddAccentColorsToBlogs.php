<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class AddAccentColorsToBlogs extends BaseMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/migrations/4/en/migrations.html#the-change-method
     *
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('blogs');
        $table->addColumn('accent_color', 'string', [
            'default' => 'Blue',
            'limit' => 50,
            'null' => false,
            'after' => 'slug',
            'comment' => 'Accent color for the blog',
        ]);
        $table->update();
    }
}
