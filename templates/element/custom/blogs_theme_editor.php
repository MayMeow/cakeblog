<?php
/**
 * Blog Theme Selector element — used in Blog add/edit forms.
 *
 * Provides a dropdown to select a theme and a variant selector (auto/light/dark).
 *
 * Expected variables: $blog (Blog entity), $themes (list of themes)
 *
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Blog $blog
 * @var array $themes
 */

$currentMode = $blog->theme_mode ?? 'auto';
?>

<fieldset class="theme-selector-fieldset">
    <legend><?= __('Theme Settings') ?></legend>

    <?php
    echo $this->Form->control('theme_id', [
        'options' => $themes,
        'empty' => __('— Default (Catppuccin) —'),
        'label' => __('Theme'),
    ]);
    ?>

    <div class="input select">
        <label for="theme-mode"><?= __('Variant') ?></label>
        <select name="theme_mode" id="theme-mode">
            <option value="auto" <?= $currentMode === 'auto' ? 'selected' : '' ?>><?= __('Auto (follow system)') ?>
            </option>
            <option value="light" <?= $currentMode === 'light' ? 'selected' : '' ?>><?= __('Light') ?></option>
            <option value="dark" <?= $currentMode === 'dark' ? 'selected' : '' ?>><?= __('Dark') ?></option>
        </select>
    </div>

    <p>
        <?= $this->Html->link(
            __('Manage Themes'),
            ['prefix' => 'Admin', 'controller' => 'Themes', 'action' => 'index'],
        ) ?>
    </p>
</fieldset>

<?php $this->append('css'); ?>
<style>
    .theme-selector-fieldset {
        margin-top: 1.5rem;
        border: 1px solid #d0d7de;
        border-radius: 6px;
        padding: 1.25rem;
    }

    .theme-selector-fieldset>legend {
        font-weight: 600;
        font-size: 1.1rem;
        padding: 0 0.5rem;
    }

    .theme-hint {
        margin-top: 0.75rem;
        font-size: 0.85rem;
    }

    .theme-manage-link {
        color: #0969da;
    }
</style>
<?php $this->end(); ?>