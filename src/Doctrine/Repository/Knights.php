<?php

declare(strict_types=1);

namespace App\Doctrine\Repository;

use App\Domain;
use Doctrine\ORM\EntityRepository;

final class Knights extends EntityRepository implements Domain\Repository\Knights
{
    /**
     * {@inheritdoc}
     */
    public function all(): array
    {
        return $this->findAll();
    }

    public function mountingTheHorse(
        Domain\Model\Horse $horse
    ): ?Domain\Model\Knight {
        return $this->findOneBy(['horse' => $horse]);
    }
}
