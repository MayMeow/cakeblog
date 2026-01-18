<?php
declare(strict_types=1);

namespace App\View\Cell;

use App\Model\Entity\Blog;
use Cake\View\Cell;

/**
 * Homepage cell
 */
class HomepageCell extends Cell
{
    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array<string, mixed>
     */
    protected array $_validCellOptions = [];

    /**
     * Initialization logic run at the end of object construction.
     *
     * @return void
     */
    public function initialize(): void
    {
    }

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
        $currentBlog = $this->request->getAttribute('currentBlog');
        $homepage = null;

        if ($currentBlog) {
            $homepage = $this->fetchTable('Posts')
            ->find('homepage', blog: $currentBlog)
            ->first();
        }
        
        $this->set(compact('homepage'));
    }
}
