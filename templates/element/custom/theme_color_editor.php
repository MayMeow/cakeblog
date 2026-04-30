<?php
/**
 * Theme Color Editor element — used in Theme add/edit forms.
 *
 * Provides 14 color inputs (7 light + 7 dark) with paired color pickers.
 * Supports HEX and OKLCH color strings.
 *
 * Expected variable: $theme (Theme entity)
 *
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Theme $theme
 */

$colorFields = [
    'background-color' => 'Background',
    'text-color' => 'Text',
    'link-color' => 'Links',
    'heading-color' => 'Headings',
    'visited-color' => 'Visited Links',
    'blockquote-color' => 'Blockquotes',
    'code-background-color' => 'Code Background',
];

// Catppuccin Latte defaults (light)
$defaultsLight = [
    'background-color' => '#eff1f5',
    'text-color' => '#4c4f69',
    'link-color' => '#1e66f5',
    'heading-color' => '#11111b',
    'visited-color' => '#8839ef',
    'blockquote-color' => '#8c8fa1',
    'code-background-color' => '#dce0e8',
];

// Catppuccin Mocha defaults (dark)
$defaultsDark = [
    'background-color' => '#1e1e2e',
    'text-color' => '#cdd6f4',
    'link-color' => '#89b4fa',
    'heading-color' => '#cdd6f4',
    'visited-color' => '#cba6f7',
    'blockquote-color' => '#7f849c',
    'code-background-color' => '#181825',
];

$themeData = $theme->theme_data ?? [];
?>

<?php foreach (['light' => $defaultsLight, 'dark' => $defaultsDark] as $mode => $defaults): ?>
    <fieldset class="theme-color-group" id="theme-group-<?= $mode ?>">
        <legend><?= ucfirst($mode) ?>     <?= __('Mode Colors') ?></legend>

        <div class="theme-color-grid">
            <?php foreach ($colorFields as $key => $label): ?>
                <?php
                $value = $themeData[$mode][$key] ?? $defaults[$key];
                $inputName = "theme_data[{$mode}][{$key}]";
                $inputId = "theme-{$mode}-" . str_replace('-', '_', $key);
                $isHex = (bool) preg_match('/^#[0-9a-fA-F]{6}$/', $value);
                ?>
                <div class="input">
                    <label for="<?= h($inputId) ?>"><?= h(__($label)) ?></label>
                    <div class="theme-color-input-row">
                        <input type="text" name="<?= h($inputName) ?>" id="<?= h($inputId) ?>" value="<?= h($value) ?>"
                            placeholder="<?= h($defaults[$key]) ?>" data-default="<?= h($defaults[$key]) ?>">
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </fieldset>
<?php endforeach; ?>

<?php $this->append('css'); ?>
<style>
    .theme-color-group {
        margin-top: 1rem;
        border: 1px solid #e1e4e8;
        border-radius: 4px;
        padding: 1rem;
    }

    .theme-color-group legend {
        font-weight: 500;
        font-size: 0.95rem;
        padding: 0 0.4rem;
    }

    .theme-color-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
        gap: 0.75rem;
    }

    .theme-color-field label {
        display: block;
        font-size: 0.85rem;
        margin-bottom: 0.25rem;
        font-weight: 500;
        color: #57606a;
    }

    .theme-color-input-row {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .theme-color-picker {
        width: 36px;
        height: 36px;
        border: 1px solid #d0d7de;
        border-radius: 4px;
        padding: 2px;
        cursor: pointer;
        background: transparent;
        flex-shrink: 0;
    }

    .theme-color-text {
        flex: 1;
        padding: 0.4rem 0.5rem;
        border: 1px solid #d0d7de;
        border-radius: 4px;
        font-family: monospace;
        font-size: 0.9rem;
    }

    .theme-color-text:focus {
        outline: none;
        border-color: #0969da;
        box-shadow: 0 0 0 3px rgba(9, 105, 218, 0.15);
    }

    .btn-reset-theme {
        margin-top: 0.75rem;
        padding: 0.35rem 0.75rem;
        font-size: 0.85rem;
        background: #f6f8fa;
        border: 1px solid #d0d7de;
        border-radius: 4px;
        cursor: pointer;
        color: #57606a;
    }

    .btn-reset-theme:hover {
        background: #eaeef2;
        border-color: #b1bac4;
    }
</style>
<?php $this->end(); ?>