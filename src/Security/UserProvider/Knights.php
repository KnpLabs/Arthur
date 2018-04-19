<?php

declare(strict_types=1);

namespace App\Security\UserProvider;

use App\Doctrine\Repository;
use App\Security\User;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

final class Knights implements UserProviderInterface
{
    /**
     * @var Repository\Knights
     */
    private $knights;

    public function __construct(Repository\Knights $knights)
    {
        $this->knights = $knights;
    }

    public function loadUserByUsername($username)
    {
        $knight = $this->knights->findOneBy(['color' => $username]);

        if (null === $knight) {
            throw new UsernameNotFoundException();
        }

        return new User\Knight($knight);
    }

    public function refreshUser(UserInterface $user)
    {
        return $this->loadUserByUsername($user->getUsername());
    }

    public function supportsClass($class)
    {
        return User\Knight::class === $class;
    }
}
