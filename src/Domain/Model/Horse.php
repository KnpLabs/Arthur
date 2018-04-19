<?php

declare(strict_types=1);

namespace App\Domain\Model;

class Horse
{
    /**
     * @var string
     */
    private $name;

    public function getName(): string
    {
        return $this->name;
    }
}
