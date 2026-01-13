<?php
$cakeDescription = 'My Blog';
?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['maymeow']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
    <header>
        <div class="title">
            <h1><a href="<?= $this->Url->build('/') ?>">My Blog</a></h1>
        </div>
        <nav>
            <a href="<?= $this->Url->build('/') ?>">Home</a>
            <a href="<?= $this->Url->build(['controller' => 'Blogs', 'action' => 'index']) ?>">Blogs</a>
        </nav>
    </header>
    <main>
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </main>
    <footer>
        Link to source code?
    </footer>
</body>

</html>