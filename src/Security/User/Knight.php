<?php

namespace App\Security\User;

use Symfony\Component\Security\Core\User\UserInterface;
use App\Domain\Model;

class Knight implements UserInterface
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

    public function eraseCredentials()
    {
    }
}
