<nav>
    <a href="<?= $this->Url->build('/') ?>">Home</a>
    <?php if (!isset($currentBlog)): ?>
        <a href="<?= $this->Url->build(['controller' => 'Blogs', 'action' => 'index']) ?>">Blogs</a>
    <?php endif; ?>
</nav>