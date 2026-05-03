<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class AddHomepageTypeToBlogs extends BaseMigration
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
        $table->addColumn('homepage_type', 'string', [
            'default' => 'home_latest',
            'limit' => 50,
            'null' => false,
        ]);
        $table->update();
    }
}
