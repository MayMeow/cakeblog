<?php
use function Cake\Core\env;

return [
    'Datasources' => [
        'default' => [
            'className' => 'Cake\Database\Connection',
            'driver' => 'Cake\Database\Driver\Sqlite',
            'persistent' => false,
            'username' => 'my_app',
            'password' => 'secret',
            'database' => ROOT . DS . 'database.sqlite',
            'encoding' => 'utf8mb4',
            'timezone' => 'UTC',
            'cacheMetadata' => true,
            'quoteIdentifiers' => false,
            'log' => false,
            'url' => env('DATABASE_URL', null),
        ],
        'test' => [
            'className' => 'Cake\Database\Connection',
            'driver' => 'Cake\Database\Driver\Sqlite',
            'persistent' => false,
            'username' => 'my_app',
            'password' => 'secret',
            'database' => ROOT . DS . 'tmp' . DS . 'tests.sqlite',
            'encoding' => 'utf8mb4',
            'timezone' => 'UTC',
            'cacheMetadata' => true,
            'quoteIdentifiers' => false,
            'log' => false,
            'url' => env('DATABASE_TEST_URL', null),
        ],
    ],
];
