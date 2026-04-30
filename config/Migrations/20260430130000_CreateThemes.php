<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreateThemes extends BaseMigration
{
    /**
     * Create the themes table for storing reusable theme definitions.
     *
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('themes');

        $table->addColumn('name', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);

        $table->addColumn('theme_data', 'text', [
            'default' => null,
            'null' => true,
            'comment' => 'JSON with light and dark color sets',
        ]);

        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);

        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);

        $table->addIndex(['name'], [
            'name' => 'UNIQUE_THEME_NAME',
            'unique' => true,
        ]);

        $table->create();
    }
}
