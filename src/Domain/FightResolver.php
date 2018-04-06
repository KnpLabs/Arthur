<?php

namespace App\Domain;

use App\Domain\Model\Knight;

interface FightResolver
{
    public function resolve(Knight ...$knights): ?Knight;
}
