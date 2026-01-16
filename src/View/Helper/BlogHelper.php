<?php
declare(strict_types=1);

namespace App\View\Helper;

use App\Model\Entity\Blog;
use App\Model\Enum\AccentColor;
use Cake\Core\Configure;
use Cake\ORM\Locator\LocatorAwareTrait;
use Cake\ORM\Locator\TableLocator;
use Cake\View\Helper;
use Cake\View\View;

/**
 * Blog helper
 */
class BlogHelper extends Helper
{
    use LocatorAwareTrait;

    protected ?Blog $currentBlog = null;
    protected bool $loaded = false;

    protected function getBlog(): ?Blog
    {
        if ($this->loaded) {
            return $this->currentBlog;
        }

        $blogId = $this->getView()->getRequest()->getAttribute('currentBlog');
        if ($blogId) {
            $this->currentBlog = $this->fetchTable('Blogs')->get($blogId);
        }

        $this->loaded = true;
        return $this->currentBlog;
    }

    /**
     * Default configuration.
     *
     * @var array<string, mixed>
     */
    protected array $_defaultConfig = [];

    public function getTitle()
    {
        $blog = $this->getBlog();

        if ($blog) {
            return $blog->title;
        }

        return Configure::read('CakeBlog.title');
    }

    public function getAccentColor(): string
    {
        $blog = $this->getBlog();
        $blogAccentColorEnum = null;
        $style = ":root { --link-color: %1\$s; }\n" .
            "@media (prefers-color-scheme: dark) { :root { --link-color: %1\$s; } }";

        // TODO not implemented
        // if ($blog && !empty($blog->accent_color)) {
            // $blogAccentColor = AccentColor::tryFrom($blog->accent_color);
        // }

        if (!$blogAccentColorEnum) {
            $blogAccentColorEnum = AccentColor::fromName(
                name: Configure::read('CakeBlog.accent') ?? '',
                fallback: AccentColor::Blue
            );
        }

        return sprintf(
            $style,
            $blogAccentColorEnum->value
        );
    }
}
