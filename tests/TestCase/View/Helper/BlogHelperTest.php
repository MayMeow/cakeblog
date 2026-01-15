<?php
declare(strict_types=1);

namespace App\Test\TestCase\View\Helper;

use App\View\Helper\BlogHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\BlogHelper Test Case
 */
class BlogHelperTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\View\Helper\BlogHelper
     */
    protected $Blog;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $view = new View();
        $this->Blog = new BlogHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Blog);

        parent::tearDown();
    }
}
