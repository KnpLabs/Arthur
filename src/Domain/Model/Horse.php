<?php

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
