<?php

namespace App\Doctrine\Repository;

use App\Domain;
use Doctrine\ORM\EntityRepository;
use ArrayIterator;

class Horses extends EntityRepository implements Domain\Repository\Horses
{
    public function getIterator()
    {
        return new ArrayIterator($this->findAll());
    }
}
