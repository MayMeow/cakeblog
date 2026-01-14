<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DomainsFixture
 */
class DomainsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'domain' => 'Lorem ipsum dolor sit amet',
                'blog_id' => 1,
                'created' => '2026-01-14 08:40:26',
                'modified' => '2026-01-14 08:40:26',
            ],
        ];
        parent::init();
    }
}
