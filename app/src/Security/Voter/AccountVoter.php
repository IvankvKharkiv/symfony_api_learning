<?php

declare(strict_types=1);

namespace App\Security\Voter;

use App\Entity\Account;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;

class AccountVoter extends Voter
{
    public const SHOW = 'SHOW';
    public const DELETE = 'DELETE';

    public function __construct(public Security $security)
    {
    }

    protected function supports(string $attribute, $subject): bool
    {
        return in_array($attribute, [self::SHOW, self::DELETE])
            && $subject instanceof \App\Entity\Account;
    }

    /**
     * @param string $attribute
     * @param Account $account
     * @param TokenInterface $token
     *
     * @return bool
     */
    protected function voteOnAttribute(string $attribute, $account, TokenInterface $token): bool
    {
        $user = $token->getUser();
        if (!$user instanceof UserInterface) {
            return false;
        }

        $accessIsGranted = match ($attribute) {
            'SHOW' => $account->getAccountHolder() === $user
                || $account->getAccountManager() === $user || $this->security->isGranted('ROLE_ADMIN'),
            'DELETE' => $this->security->isGranted('ROLE_ADMIN'),
        };

        return $accessIsGranted;
//        switch ($attribute) {
//            case self::SHOW:
//                return true;
//                break;
//            case self::DELETE:
//                return false;
//                break;
//        }

        return false;
    }
}
