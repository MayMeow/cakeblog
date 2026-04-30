<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Theme $theme
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $theme->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $theme->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Themes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="themes form content">
            <?= $this->Form->create($theme) ?>
            <fieldset>
                <legend><?= __('Edit Theme') ?></legend>
                <?php
                    echo $this->Form->control('name');
                ?>
                <?= $this->element('custom/theme_color_editor') ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
