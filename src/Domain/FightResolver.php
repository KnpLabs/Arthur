<?php

declare(strict_types=1);

namespace App\Domain;

use App\Domain\Model\Knight;

interface FightResolver
{
    public function resolve(Knight ...$knights): ?Knight;
}
