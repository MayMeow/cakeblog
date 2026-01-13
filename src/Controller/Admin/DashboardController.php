<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

class DashboardController extends AppController
{
    public function index()
    {
        $this->set('title', 'Admin Dashboard');

        $blogsCount = $this->fetchTable('Blogs')->find()->count();
        $postsCount = $this->fetchTable('Posts')->find()->count();
        $usersCount = $this->fetchTable('Users')->find()->count();

        $this->set(compact('blogsCount', 'postsCount', 'usersCount'));
    }
}
