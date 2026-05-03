<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class AddCustomFieldsToBlogs extends BaseMigration
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
        $table->addColumn('custom_css', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('custom_header', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('mastodon_link', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->update();
    }
}
