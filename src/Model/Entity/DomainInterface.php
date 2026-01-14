<?php
declare(strict_types=1);

namespace App\Model\Entity;

interface DomainInterface
{
    public function getDomains(): array;
}