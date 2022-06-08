<?php

declare(strict_types=1);

namespace App\EventSubscriber;

use App\Repository\UserRepository;
use League\Bundle\OAuth2ServerBundle\Event\UserResolveEvent;
use League\Bundle\OAuth2ServerBundle\OAuth2Events;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserResolverEventSubscriber implements EventSubscriberInterface
{
    private UserRepository $userRepository;
    private UserPasswordHasherInterface $userPasswordHasher;

    public function __construct(UserRepository $userRepository, UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->userRepository = $userRepository;
        $this->userPasswordHasher = $userPasswordHasher;
    }

    public static function getSubscribedEvents()
    {
        return [
            OAuth2Events::USER_RESOLVE => 'userResolve',
        ];
    }

    public function userResolve(UserResolveEvent $event)
    {
        $user = $this->userRepository->findOneBy(['email' => $event->getUsername()]);
        if (!$user) {
            return;
        }
        if ($this->userPasswordHasher->isPasswordValid($user, $event->getPassword())) {
            $event->setUser($user);
        }
    }
}
