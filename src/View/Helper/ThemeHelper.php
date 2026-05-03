<?php
declare(strict_types=1);

namespace App\View\Helper;

use App\Model\Entity\Blog;
use Cake\View\Helper;

/**
 * Theme helper
 *
 * Generates per-blog CSS custom property style blocks and body classes
 * for the dynamic multi-tenant theming system.
 *
 * Reads theme colors from the blog's associated Theme entity.
 */
class ThemeHelper extends Helper
{
    /**
     * The 7 CSS custom properties managed by the theme system.
     *
     * @var string[]
     */
    protected const VARIABLE_NAMES = [
        'background-color',
        'text-color',
        'link-color',
        'heading-color',
        'visited-color',
        'blockquote-color',
        'code-background-color',
    ];

    /**
     * Catppuccin Latte (light) defaults.
     *
     * @var array<string, string>
     */
    protected const DEFAULTS_LIGHT = [
        'background-color' => '#eff1f5',
        'text-color' => '#4c4f69',
        'link-color' => '#1e66f5',
        'heading-color' => '#11111b',
        'visited-color' => '#8839ef',
        'blockquote-color' => '#8c8fa1',
        'code-background-color' => '#dce0e8',
    ];

    /**
     * Catppuccin Mocha (dark) defaults.
     *
     * @var array<string, string>
     */
    protected const DEFAULTS_DARK = [
        'background-color' => '#1e1e2e',
        'text-color' => '#cdd6f4',
        'link-color' => '#89b4fa',
        'heading-color' => '#cdd6f4',
        'visited-color' => '#cba6f7',
        'blockquote-color' => '#7f849c',
        'code-background-color' => '#181825',
    ];

    protected ?Blog $currentBlog = null;
    protected bool $loaded = false;

    /**
     * Default configuration.
     *
     * @var array<string, mixed>
     */
    protected array $_defaultConfig = [];

    /**
     * Lazily fetch the current blog from the request attribute.
     */
    protected function getBlog(): ?Blog
    {
        if ($this->loaded) {
            return $this->currentBlog;
        }

        $currentBlog = $this->getView()->getRequest()->getAttribute('currentBlog');
        if (!empty($currentBlog) && $currentBlog instanceof Blog) {
            $this->currentBlog = $currentBlog;
        }

        $this->loaded = true;
        return $this->currentBlog;
    }

    /**
     * Render the <style> block containing CSS custom properties
     * for both light and dark modes.
     *
     * Reads colors from the blog's associated Theme entity.
     * Falls back to Catppuccin defaults if no theme is assigned.
     *
     * @return string HTML <style> element
     */
    public function renderStyles(): string
    {
        $blog = $this->getBlog();

        $themeData = null;
        if ($blog && !empty($blog->theme) && !empty($blog->theme->theme_data)) {
            $themeData = $blog->theme->theme_data;
        }

        $light = $this->mergeWithDefaults($themeData['light'] ?? [], self::DEFAULTS_LIGHT);
        $dark = $this->mergeWithDefaults($themeData['dark'] ?? [], self::DEFAULTS_DARK);

        $lightVars = $this->buildCssVariables($light);
        $darkVars = $this->buildCssVariables($dark);

        $css = <<<CSS
<style>
/* Theme: light mode (default + explicit class) */
:root,
.theme-light {
{$lightVars}
}

/* Theme: dark mode (system preference, unless .theme-light is forced) */
@media (prefers-color-scheme: dark) {
  :root:not(.theme-light) {
{$darkVars}
  }
}

/* Theme: dark mode (explicit class override) */
.theme-dark {
{$darkVars}
}
</style>
CSS;

        return $css;
    }

    /**
     * Return the CSS class to apply to <body> based on the blog's theme_mode.
     *
     * @return string 'theme-light', 'theme-dark', or '' (auto)
     */
    public function getBodyClass(): string
    {
        $blog = $this->getBlog();

        if (!$blog) {
            return '';
        }

        return match ($blog->theme_mode) {
            'light' => 'theme-light',
            'dark' => 'theme-dark',
            default => '',
        };
    }

    /**
     * Merge user-supplied color values with defaults, keeping only known keys.
     *
     * @param array<string, string> $custom User-supplied values
     * @param array<string, string> $defaults Default values
     * @return array<string, string>
     */
    protected function mergeWithDefaults(array $custom, array $defaults): array
    {
        $result = [];
        foreach (self::VARIABLE_NAMES as $name) {
            $value = trim($custom[$name] ?? '');
            $result[$name] = $value !== '' ? $value : $defaults[$name];
        }
        return $result;
    }

    /**
     * Build indented CSS custom property declarations.
     *
     * @param array<string, string> $colors
     * @return string
     */
    protected function buildCssVariables(array $colors): string
    {
        $lines = [];
        foreach ($colors as $name => $value) {
            $lines[] = '    --' . htmlspecialchars($name) . ': ' . htmlspecialchars($value) . ';';
        }
        return implode("\n", $lines);
    }
}
