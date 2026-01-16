<?php
echo $this->Form->label('accent_color', 'Color');
$selectedColor = $blog->accent_color ?? '';
echo '<div class="color-group">';
foreach ($colors as $case) {
    $id = 'accent-color-' . strtolower($case->name);
    $checked = $selectedColor === $case->name ? ' checked' : '';
    echo '<label class="color-option" for="' . h($id) . '">';
    echo '<input type="radio" name="accent_color" id="' . h($id) . '" value="' . h($case->name) . '"' . $checked . '>';
    echo '<span class="swatch" style="--c:' . h($case->value) . '"></span>';
    echo '</label>';
}
echo '</div>';

$this->append('css') ?>
<style>
    .color-group {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    .color-option {
        position: relative;
        cursor: pointer;
    }

    .color-option input {
        position: absolute;
        opacity: 0;
        pointer-events: none;
    }

    .swatch {
        width: 28px;
        height: 28px;
        background: var(--c);
        border-radius: 4px;
        border: 2px solid transparent;
        display: inline-block;
    }

    .color-option input:checked + .swatch {
        border-color: #000;
    }

    .color-option input:focus-visible + .swatch {
        outline: 2px solid #000;
        outline-offset: 2px;
    }
</style>
<?php $this->end() ?>