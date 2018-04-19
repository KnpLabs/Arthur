<?php

declare(strict_types=1);

namespace spec\App\Domain\Task;

use App\Domain\FightResolver;
use App\Domain\Model;
use App\Domain\Task\FightAKnightAgainstAnOtherOne;
use PhpSpec\ObjectBehavior;

class FightAKnightAgainstAnOtherOneSpec extends ObjectBehavior
{
    function let(FightResolver $fightResolver): void
    {
        $this->beConstructedWith($fightResolver);
    }

    function it_is_initializable(): void
    {
        $this->shouldHaveType(FightAKnightAgainstAnOtherOne::class);
    }

    function it_gives_the_victory_to_the_winner(
        $fightResolver,
        Model\Knight $knight1,
        Model\Knight $knight2
    ): void {
        $fightResolver->resolve($knight1, $knight2)->willReturn($knight1);

        $this($knight1, $knight2);

        $knight1->increaseNumberOfVictories()->shouldHaveBeenCalledTimes(1);
        $knight2->increaseNumberOfDefeats()->shouldHaveBeenCalledTimes(1);
    }
}
