<?php
declare(strict_types=1);

use Migrations\AbstractSeed;
use Authentication\PasswordHasher\DefaultPasswordHasher;

class DatabaseSeed extends AbstractSeed
{
    public function run(): void
    {
        $hasher = new DefaultPasswordHasher();
        $password = $hasher->hash('password');
        $now = date('Y-m-d H:i:s');

        $data = [
            [
                'username' => 'admin',
                'password' => $password,
                'created' => $now,
                'modified' => $now,
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();

        // Get user ID (assuming 1 for first user in SQLite)
        $userId = 1;

        $data = [
            [
                'title' => 'My Tech Blog',
                'description' => 'A blog about everything tech.',
                'slug' => 'my-tech-blog',
                'user_id' => $userId,
                'created' => $now,
                'modified' => $now,
            ],
        ];

        $table = $this->table('blogs');
        $table->insert($data)->save();

        // Get blog ID (assuming 1)
        $blogId = 1;

        $data = [
            [
                'title' => 'Hello World',
                'body' => 'Welcome to my new CakePHP blog! This is the first post.',
                'slug' => 'hello-world',
                'published' => 1,
                'blog_id' => $blogId,
                'created' => $now,
                'modified' => $now,
            ],
        ];

        $table = $this->table('posts');
        $table->insert($data)->save();
    }
}
