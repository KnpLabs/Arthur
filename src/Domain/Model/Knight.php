<?php

namespace App\Domain\Model;

class Knight
{
    /**
     * @var string
     */
    private $identifier;

    /**
     * @var string
     */
    private $color;

    /**
     * @var Horse | null
     */
    private $horse;

    /**
     * @var int
     */
    private $victories = 0;

    /**
     * @var int
     */
    private $defeats = 0;

    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function attributeAHorse(Horse $horse)
    {
        $this->horse = $horse;
    }

    public function getHorse()
    {
        return $this->horse;
    }

    public function increaseNumberOfVictories()
    {
        $this->victories++;
    }

    public function increaseNumberOfDefeats()
    {
        $this->defeats++;
    }
}
