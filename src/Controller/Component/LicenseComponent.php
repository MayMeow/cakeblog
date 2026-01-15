<?php
declare(strict_types=1);

namespace App\Controller\Component;

use App\Service\LicenseService;
use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;

/**
 * License component
 */
class LicenseComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array<string, mixed>
     */
    protected array $_defaultConfig = [];

    /**
     * Constructor
     *
     * @param \Cake\Controller\ComponentRegistry $registry The component registry.
     * @param array $config The component config
     * @param \App\Service\LicenseService $licenseService License service
     */
    public function __construct(
        ComponentRegistry $registry,
        array $config,
        protected LicenseService $licenseService
    ) {
        parent::__construct($registry, $config);
    }

    public function canCreateBlog(): bool
    {
        // default blogs count
        $defaultBlogCount = 1;

        // check license for blogs count
        $license = $this->licenseService->getLicense();
        if ($license !== false) {
            $licensedBlogsCount = $license->getFeatureValue('blogs');

            if (is_int($licensedBlogsCount)) {
                $defaultBlogCount = $licensedBlogsCount;
            }
        }

        // Get current blogs count
        $blogsTable = $this->getController()->getTableLocator()->get('Blogs');
        $currentBlogsCount = $blogsTable->find()->count();

        return $currentBlogsCount < $defaultBlogCount;
    }
}
