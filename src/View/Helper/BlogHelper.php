<?php
declare(strict_types=1);

namespace App\View\Helper;

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

    /**
     * Default configuration.
     *
     * @var array<string, mixed>
     */
    protected array $_defaultConfig = [];

    public function getTitle()
    {
        $blogId = $this->getView()->getRequest()->getAttribute('currentBlog');

        if ($blogId) {
            $blogsTable = $this->getTableLocator()->get('Blogs');
            $blog = $blogsTable->get($blogId);
            return h($blog->title);
        }

        return Configure::read('CakeBlog.title');
    }
}
