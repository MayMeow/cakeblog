<nav>
    <a href="<?= $this->Url->build('/') ?>">Home</a>
    <?php if (!isset($currentBlog)): ?>
        <a href="<?= $this->Url->build(['controller' => 'Blogs', 'action' => 'index']) ?>">Blogs</a>
    <?php endif; ?>

    <?php if (!empty($pinnedPosts) && isset($currentBlog)): ?>
        <?php foreach ($pinnedPosts as $post): ?>
            <a href="<?= $this->Url->build(['controller' => 'Posts', 'action' => 'view', $post->id]) ?>">
                <?= h($post->title) ?>
            </a>
        <?php endforeach; ?>
    <?php endif; ?>
</nav>