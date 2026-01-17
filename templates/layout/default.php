<?php
$cakeDescription = 'My Blog';

$this->start('css');
?>
<style>
<?= $this->Blog->getAccentColor() ?>
</style>
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

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
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
        Powered by <a href="https://github.com/MayMeow/cakeblog">Sprinkle</a> 🧁
    </footer>
</body>

</html>