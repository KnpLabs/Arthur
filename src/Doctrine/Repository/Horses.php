<?php

declare(strict_types=1);

namespace App\Doctrine\Repository;

use App\Domain;
use ArrayIterator;
use Doctrine\ORM\EntityRepository;

final class Horses extends EntityRepository implements Domain\Repository\Horses
{
    public function getIterator()
    {
        return new ArrayIterator($this->findAll());
    }
}
