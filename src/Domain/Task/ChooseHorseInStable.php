<?php

declare(strict_types=1);

namespace App\Domain\Task;

use App\Domain\Exception;
use App\Domain\Model;
use App\Domain\Repository;

final class ChooseHorseInStable
{
    /**
     * @var Repository\Knights
     */
    private $knights;

    /**
     * @var Repository\Horses
     */
    private $horses;

    public function __construct(
        Repository\Knights $knights,
        Repository\Horses $horses
    ) {
        $this->knights = $knights;
        $this->horses  = $horses;
    }

    public function __invoke(Model\Knight $knight): void
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
