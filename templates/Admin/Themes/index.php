<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Theme> $themes
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('New Theme'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="themes index content">
            <h3>🎨 <?= __('Themes') ?></h3>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($themes as $theme): ?>
                            <tr>
                                <td><?= $this->Number->format($theme->id) ?></td>
                                <td><?= h($theme->name) ?></td>
                                <td><?= h($theme->created) ?></td>
                                <td><?= h($theme->modified) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $theme->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $theme->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $theme->id], ['confirm' => __('Are you sure you want to delete # {0}?', $theme->id)]) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>