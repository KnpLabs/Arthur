<?php

declare(strict_types=1);

namespace App\Domain\Repository;

use App\Domain\Model;

interface Knights
{
    /**
     * @return Model\Knight[]
     */
    public function all(): array;

    public function mountingTheHorse(Model\Horse $horse): ?Model\Knight;
}
