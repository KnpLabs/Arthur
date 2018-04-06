<?php

namespace spec\App\Domain\Task;

use App\Domain\Task\ListKnights;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use App\Domain\Repository\Knights;
use App\Domain\Model\Knight;

class ListKnightsSpec extends ObjectBehavior
{
    function let(Knights $knights)
    {
        $this->beConstructedWith($knights);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(ListKnights::class);
    }

    function it_returns_all_knights($knights, Knight $knight)
    {
        $knights->all()->willReturn([$knight])->shouldBeCalledTimes(1);

        $this()->shouldReturn([$knight]);
    }
}
