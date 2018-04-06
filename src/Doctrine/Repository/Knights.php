<?php

namespace App\Doctrine\Repository;

use App\Domain;
use Doctrine\ORM\EntityRepository;

class Knights extends EntityRepository implements Domain\Repository\Knights
{
    /**
     * {@inheritdoc}
     */
    public function all(): array
    {
        return $this->findAll();
    }

    public function mountingTheHorse(Domain\Model\Horse $horse): ?Domain\Model\Knight
    {
        return $this->findOneBy(['horse' => $horse]);
    }
}
