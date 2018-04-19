<?php

declare(strict_types=1);

namespace App\Domain\Task;

use App\Domain\Repository;

final class ListKnights
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
