<?php

declare(strict_types=1);

namespace spec\App\Domain\Task;

use App\Domain\Model\Knight;
use App\Domain\Repository\Knights;
use App\Domain\Task\ListKnights;
use PhpSpec\ObjectBehavior;

class ListKnightsSpec extends ObjectBehavior
{
    function let(Knights $knights): void
    {
        $this->beConstructedWith($knights);
    }

    function it_is_initializable(): void
    {
        $this->shouldHaveType(ListKnights::class);
    }

    function it_returns_all_knights($knights, Knight $knight): void
    {
        $knights->all()->willReturn([$knight])->shouldBeCalledTimes(1);

        $this()->shouldReturn([$knight]);
    }
}
