<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Comment $comment
 * @var string|null $revealedEmail
 * @var bool $hasError
 */
?>
<div class="comments reveal-email content">
    <h3>🔐 <?= __('Reveal Commenter Email') ?></h3>

    <div class="reveal-comment-info">
        <table>
            <tr>
                <th><?= __('Comment ID') ?></th>
                <td><?= $this->Number->format($comment->id) ?></td>
            </tr>
            <tr>
                <th><?= __('Author') ?></th>
                <td><?= h($comment->author_name) ?></td>
            </tr>
            <tr>
                <th><?= __('Post') ?></th>
                <td>
                    <?= $comment->hasValue('post')
                        ? $this->Html->link(
                            h($comment->post->title),
                            ['controller' => 'Posts', 'action' => 'view', $comment->post->id]
                        )
                        : '—' ?>
                </td>
            </tr>
            <tr>
                <th><?= __('Date') ?></th>
                <td><?= h($comment->created) ?></td>
            </tr>
        </table>
    </div>

    <?php if (isset($revealedEmail)): ?>
        <div class="reveal-result">
            <h4>✉️ <?= __('Email Address') ?></h4>
            <p class="revealed-email"><?= h($revealedEmail) ?></p>
        </div>
    <?php else: ?>
        <div class="reveal-form">
            <p class="reveal-hint"><?= __('Enter your admin password to reveal this email address.') ?></p>
            <?= $this->Form->create(null, ['url' => ['action' => 'revealEmail', $comment->id]]) ?>
            <?= $this->Form->control('password', [
                'type' => 'password',
                'label' => __('Password'),
                'required' => true,
                'id' => 'reveal-password',
                'autocomplete' => 'current-password',
            ]) ?>
            <?= $this->Form->button(__('Reveal Email'), ['class' => 'button']) ?>
            <?= $this->Form->end() ?>
        </div>
    <?php endif; ?>

    <div class="reveal-actions">
        <?= $this->Html->link(__('← Back to Comments'), ['action' => 'index']) ?>
    </div>
</div>