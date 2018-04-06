<?php

namespace spec\App\Domain\Task;

use App\Domain\Task\FightAKnightAgainstAnOtherOne;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use App\Domain\FightResolver;
use App\Domain\Model;

class FightAKnightAgainstAnOtherOneSpec extends ObjectBehavior
{
    function let(FightResolver $fightResolver)
    {
        $this->beConstructedWith($fightResolver);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(FightAKnightAgainstAnOtherOne::class);
    }

    function it_gives_the_victory_to_the_winner($fightResolver, Model\Knight $knight1, Model\Knight $knight2)
    {
        $fightResolver->resolve($knight1, $knight2)->willReturn($knight1);

        $this($knight1, $knight2);

        $knight1->increaseNumberOfVictories()->shouldHaveBeenCalledTimes(1);
        $knight2->increaseNumberOfDefeats()->shouldHaveBeenCalledTimes(1);
    }
}
