<?php
$cakeDescription = 'My Blog';

$this->start('css');
?>
<style>
    :root { --link-color: oklch(85.2% 0.199 91.936); }
    @media (prefers-color-scheme: dark) { :root { --link-color: oklch(85.2% 0.199 91.936); } }
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
        Made with ❤️ by <a href="https://catgirl.sk">MayMeow</a> &copy; <?= date('Y') ?>
    </footer>
</body>

</html>