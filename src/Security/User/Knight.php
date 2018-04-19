<?php

declare(strict_types=1);

namespace App\Security\User;

use App\Domain\Model;
use Symfony\Component\Security\Core\User\UserInterface;

final class Knight implements UserInterface
{
    /**
     * @var Model\Knight
     */
    private $knight;

    public function __construct(Model\Knight $knight)
    {
        $this->knight = $knight;
    }

    public function getRoles()
    {
        return [];
    }

    public function getPassword()
    {
        return null;
    }

    public function getSalt()
    {
        return null;
    }

    public function getUsername()
    {
        return $this->knight->getColor();
    }

    public function eraseCredentials(): void
    {
    }
}
