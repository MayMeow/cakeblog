<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Post> $posts
 */
?>
<div class="posts index content">
    <!-- Guest View: No Actions -->
    <h3>🐰 <?= __('Posts') ?></h3>
    
    <ul>
        <?php foreach ($posts as $post): ?>
        <li>
            <?= $this->Html->link($post->title, ['action' => 'view', $post->id]) ?>
        </li>
        <?php endforeach; ?>
    </ul>

    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('⬅️' . __('previous')) ?>
            <?= $this->Paginator->next('➡️' . __('next')) ?>
        </ul>
    </div>
</div>