<?php

namespace App\Domain\Task;

use App\Domain\Repository;
use Prophecy\Prophet;
use App\Domain\Model\Knight;

class ListKnights
{
    /**
     * @var Repository\Knights
     */
    private $knights;

    public function __construct(Repository\Knights $knights)
    {
        $this->knights = $knights;
    }

    public function __invoke(): array
    {
        return $this->knights->all();
    }
}
