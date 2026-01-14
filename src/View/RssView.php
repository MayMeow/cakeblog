<?php
declare(strict_types=1);

namespace App\View;

use Cake\View\View;

class RssView extends View
{
    /**
     * Layouts are located in the rss subdirectory of `Layouts/`
     *
     * @var string
     */
    protected string $layoutPath = 'rss';

    /**
     * Views are located in the 'rss' subdirectory for controllers' views.
     *
     * @var string
     */
    protected string $subDir = 'rss';

    /**
     * Mime-type this view class renders as.
     *
     * @return string The RSS content type.
     */
    public static function contentType(): string
    {
        return 'application/rss+xml';
    }
}
