<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        Admin:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'cake']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <style>
        .admin-nav {
            background-color: #2c3e50;
            padding: 1rem;
            margin-bottom: 2rem;
        }

        .admin-nav a {
            color: white;
            margin-right: 1rem;
            text-decoration: none;
            font-weight: bold;
        }

        .admin-nav a:hover {
            text-decoration: underline;
        }

        .admin-container {
            padding: 0 2rem;
        }
    </style>
</head>

<body>
    <nav class="admin-nav">
        <div class="admin-container">
            <?= $this->Html->link('Dashboard', ['prefix' => 'Admin', 'controller' => 'Dashboard', 'action' => 'index']) ?>
            <?= $this->Html->link('Blogs', ['prefix' => 'Admin', 'controller' => 'Blogs', 'action' => 'index']) ?>
            <?= $this->Html->link('Posts', ['prefix' => 'Admin', 'controller' => 'Posts', 'action' => 'index']) ?>
            <span style="float: right;">
                <?= $this->Html->link('View Site', ['prefix' => false, 'controller' => 'Blogs', 'action' => 'index'], ['target' => '_blank']) ?>
                <?= $this->Html->link('Logout', ['prefix' => false, 'controller' => 'Users', 'action' => 'logout']) ?>
            </span>
        </div>
    </nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>

</html>