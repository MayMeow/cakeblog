<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Comment> $comments
 */
?>
<div class="comments index content">
    <h3><?= __('Comments') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= __('Post') ?></th>
                    <th><?= $this->Paginator->sort('author_name') ?></th>
                    <th><?= $this->Paginator->sort('author_email') ?></th>
                    <th><?= __('Comment') ?></th>
                    <th><?= $this->Paginator->sort('is_approved', __('Status')) ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($comments as $comment): ?>
                <tr>
                    <td><?= $this->Number->format($comment->id) ?></td>
                    <td>
                        <?= $comment->hasValue('post')
                            ? $this->Html->link(
                                \Cake\Utility\Text::truncate($comment->post->title, 30),
                                ['controller' => 'Posts', 'action' => 'view', $comment->post->id]
                            )
                            : '' ?>
                    </td>
                    <td><?= h($comment->author_name) ?></td>
                    <td><?= h($comment->author_email) ?></td>
                    <td><?= \Cake\Utility\Text::truncate(h($comment->body), 80) ?></td>
                    <td>
                        <?php if ($comment->is_approved): ?>
                            <span style="color: green; font-weight: bold;">✅ <?= __('Approved') ?></span>
                        <?php else: ?>
                            <span style="color: orange; font-weight: bold;">⏳ <?= __('Pending') ?></span>
                        <?php endif; ?>
                    </td>
                    <td><?= h($comment->created) ?></td>
                    <td class="actions">
                        <?php if (!$comment->is_approved): ?>
                            <?= $this->Form->postLink(
                                __('Approve'),
                                ['action' => 'approve', $comment->id],
                                ['confirm' => __('Approve this comment?')]
                            ) ?>
                        <?php endif; ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $comment->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete this comment?'),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
