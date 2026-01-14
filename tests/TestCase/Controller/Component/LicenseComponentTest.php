<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\LicenseComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\LicenseComponent Test Case
 */
class LicenseComponentTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Controller\Component\LicenseComponent
     */
    protected $License;

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->License = new LicenseComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->License);

        parent::tearDown();
    }
}
