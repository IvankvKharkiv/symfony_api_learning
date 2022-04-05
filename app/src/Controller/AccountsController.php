<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Account;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AccountsController extends AbstractController
{
    /**
     * @Route("/accounts/overview", name="app_accounts")
     * @IsGranted("ROLE_BOOKKEEPER")
     */
    public function index()
    {
        return $this->render('accounts/index.html.twig');
    }

    /**
     * @IsGranted("SHOW", subject="account")
     *
     * @param Account $account
     */
    #[Route('/accounts/{id}', name: 'app_accounts', methods: ['GET'])]
    public function show(Account $account)
    {
        $this->render(
            'account\index.html.twig',
            [
                'account' => $account,
            ]
        );
    }
}
