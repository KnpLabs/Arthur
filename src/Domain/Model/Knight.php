<?php

declare(strict_types=1);

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
     * @var string | null
     */
    private $title;

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

    public function getHorse()
    {
        return $this->horse;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function attributeAHorse(Horse $horse): void
    {
        $this->horse = $horse;
    }

    public function increaseNumberOfVictories(): void
    {
        ++$this->victories;
    }

    public function increaseNumberOfDefeats(): void
    {
        ++$this->defeats;
    }
}
