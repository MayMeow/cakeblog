<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Domain $domain
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Domain'), ['action' => 'edit', $domain->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Domain'), ['action' => 'delete', $domain->id], ['confirm' => __('Are you sure you want to delete # {0}?', $domain->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Domains'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Domain'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="domains view content">
            <h3><?= h($domain->domain) ?></h3>
            <table>
                <tr>
                    <th><?= __('Domain') ?></th>
                    <td><?= h($domain->domain) ?></td>
                </tr>
                <tr>
                    <th><?= __('Blog') ?></th>
                    <td><?= $domain->hasValue('blog') ? $this->Html->link($domain->blog->title, ['controller' => 'Blogs', 'action' => 'view', $domain->blog->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($domain->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($domain->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($domain->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>