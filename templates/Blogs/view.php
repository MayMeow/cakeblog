<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Blog $blog
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <?= $this->Html->link(__('List Blogs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="blogs view content">
            <h3><?= h($blog->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($blog->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Slug') ?></th>
                    <td><?= h($blog->slug) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $blog->hasValue('user') ? $this->Html->link($blog->user->username, ['controller' => 'Users', 'action' => 'view', $blog->user->id]) : '' ?>
                    </td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($blog->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($blog->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($blog->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($blog->description)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Posts') ?></h4>
                <?php if (!empty($blog->posts)): ?>
                    <div class="table-responsive">
                        <table>
                            <tr>
                                <th><?= __('Id') ?></th>
                                <th><?= __('Title') ?></th>
                                <th><?= __('Body') ?></th>
                                <th><?= __('Slug') ?></th>
                                <th><?= __('Published') ?></th>
                                <th><?= __('Created') ?></th>
                                <th><?= __('Modified') ?></th>

                            </tr>
                            <?php foreach ($blog->posts as $post): ?>
                                <tr>
                                    <td><?= h($post->id) ?></td>
                                    <td><?= h($post->title) ?></td>
                                    <td><?= h($post->body) ?></td>
                                    <td><?= h($post->slug) ?></td>
                                    <td><?= h($post->published) ?></td>
                                    <td><?= h($post->created) ?></td>
                                    <td><?= h($post->modified) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['controller' => 'Posts', 'action' => 'view', $post->id]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>