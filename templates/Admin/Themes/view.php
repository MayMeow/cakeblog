<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Theme $theme
 */

$themeData = $theme->theme_data ?? [];
$lightColors = $themeData['light'] ?? [];
$darkColors = $themeData['dark'] ?? [];
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Theme'), ['action' => 'edit', $theme->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Theme'), ['action' => 'delete', $theme->id], ['confirm' => __('Are you sure you want to delete # {0}?', $theme->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Themes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Theme'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="themes view content">
            <h3><?= h($theme->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($theme->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($theme->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($theme->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($theme->modified) ?></td>
                </tr>
            </table>

            <h4><?= __('Color Preview') ?></h4>
            <div style="display: flex; gap: 2rem; flex-wrap: wrap;">
                <?php foreach (['light' => $lightColors, 'dark' => $darkColors] as $mode => $colors): ?>
                <div>
                    <h5><?= ucfirst($mode) ?> <?= __('Mode') ?></h5>
                    <?php if (!empty($colors)): ?>
                    <table>
                        <?php foreach ($colors as $varName => $varValue): ?>
                        <tr>
                            <td><?= h($varName) ?></td>
                            <td>
                                <span style="display:inline-block;width:20px;height:20px;background:<?= h($varValue) ?>;border:1px solid #ccc;border-radius:3px;vertical-align:middle;"></span>
                                <code><?= h($varValue) ?></code>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    <?php else: ?>
                    <p><em><?= __('Using defaults') ?></em></p>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="related">
                <h4><?= __('Blogs Using This Theme') ?></h4>
                <?php if (!empty($theme->blogs)): ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Title') ?></th>
                            <th><?= __('Variant') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($theme->blogs as $blog): ?>
                        <tr>
                            <td><?= h($blog->id) ?></td>
                            <td><?= h($blog->title) ?></td>
                            <td><?= h($blog->theme_mode) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Blogs', 'action' => 'edit', $blog->id]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php else: ?>
                <p><?= __('No blogs are using this theme yet.') ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
