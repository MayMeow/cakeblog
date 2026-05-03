<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class AddThemeToBlogs extends BaseMigration
{
    /**
     * Change Method.
     *
     * Adds theme_mode and theme_data columns to the blogs table
     * to support per-blog dynamic theming with light/dark mode.
     *
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('blogs');

        $table->addColumn('theme_mode', 'string', [
            'default' => 'auto',
            'limit' => 10,
            'null' => false,
            'comment' => 'Theme mode: auto, light, or dark',
        ]);

        $table->update();
    }
}
