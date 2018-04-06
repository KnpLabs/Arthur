<?php

namespace App\Domain\Task;

use App\Domain\Model;
use App\Domain\Exception;
use App\Domain\Repository;

class ChooseHorseInStable
{
    /**
     * @var Repository\Knights
     */
    private $knights;

    /**
     * @var Repository\Horses
     */
    private $horses;

    public function __construct(Repository\Knights $knights, Repository\Horses $horses)
    {
        $this->knights = $knights;
        $this->horses = $horses;
    }

    public function __invoke(Model\Knight $knight)
    {
        foreach ($this->horses as $horse) {
            $mounting = $this->knights->mountingTheHorse($horse);

            if (null !== $mounting) {
                continue;
            }

            $knight->attributeAHorse($horse);

            return;
        }

        throw new Exception\NoFreeHorse();
    }
}
