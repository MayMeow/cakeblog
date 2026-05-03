<?php
$cakeDescription = 'My Blog';

$this->start('css');
?>
<?= $this->Theme->renderStyles() ?>
<?php
$this->end();
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

    <?php if ($this->Blog->getCustomCss()): ?>
        <style>
            <?= $this->Blog->getCustomCss() ?>
        </style>
    <?php endif; ?>

    <?php if ($this->Blog->getMastodonLink()): ?>
        <meta name="fediverse:creator" content="<?= h($this->Blog->getMastodonLink()) ?>">
    <?php endif; ?>

    <?= $this->Blog->getCustomHeader() ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body class="<?= $this->Theme->getBodyClass() ?>">
    <header>
        <div class="header">
            <a class="title" href="<?= $this->Url->build('/') ?>">
                <h2><?= $this->Blog->getTitle() ?></h2>
            </a>
        </div>
        <?= $this->cell('Navigation')->render() ?>
    </header>
    <main>
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </main>
    <footer>
        <div style="margin-bottom: 1rem;">
            <?= $this->fetch('footer') ?>
            <?= $this->Blog->getTitle() ?> &copy; <?= date('Y') ?>
        </div>
        Powered by <a href="https://github.com/MayMeow/cakeblog">MeowBlog</a> 🧁
    </footer>
</body>

</html>