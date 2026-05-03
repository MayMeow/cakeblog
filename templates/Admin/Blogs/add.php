<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Blog $blog
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Blogs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="blogs form content">
            <?= $this->Form->create($blog) ?>
            <fieldset>
                <legend><?= __('Add Blog') ?></legend>
                <?php
                    echo $this->Form->control('title');
                    echo $this->Form->control('description');
                    echo $this->Form->control('slug');
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('is_public');

                    $homepageTypes = [];
                    foreach (\App\Model\Enum\HomepageType::cases() as $case) {
                        $homepageTypes[$case->value] = $case->label();
                    }
                    echo $this->Form->control('homepage_type', ['options' => $homepageTypes]);
                    echo $this->Form->control('custom_header', ['type' => 'textarea']);
                    echo $this->Form->control('custom_css', ['type' => 'textarea']);
                    echo $this->Form->control('mastodon_link');
                ?>
                <?= $this->element('custom/blogs_theme_editor') ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
