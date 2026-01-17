<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Blog> $blogs
 */
?>
<div class="blogs index content">
    <!-- Guest View: No Actions -->

    <h3><?= __('Blogs') ?></h3>
    <div class="table-responsive">
        <ul>
            <?php foreach ($blogs as $blog): ?>
                <li>
                    <?= $this->Html->link(h($blog->title), ['action' => 'view', $blog->id]) ?>
                    <?= $blog->description ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('⬅️' . __('previous')) ?>
            <?= $this->Paginator->next('➡️' . __('next')) ?>
        </ul>
        <p><?= $this->Paginator->counter(__('There are {{count}} blogs total')) ?>
        </p>
    </div>
</div>