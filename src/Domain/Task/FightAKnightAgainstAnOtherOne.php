<?php

namespace App\Domain\Task;

use App\Domain\FightResolver;
use App\Domain\Model\Knight;

final class FightAKnightAgainstAnOtherOne
{
    private $fightResolver;

    public function __construct(FightResolver $fightResolver)
    {
        $this->fightResolver = $fightResolver;
    }

    public function __invoke(Knight ...$knights)
    {
        $winner = $this->fightResolver->resolve(...$knights);

        if (null === $winner) {
            return;
        }

        foreach ($knights as $knight) {
            $winner === $knight
                ? $knight->increaseNumberOfVictories()
                : $knight->increaseNumberOfDefeats()
            ;
        }
    }
}
