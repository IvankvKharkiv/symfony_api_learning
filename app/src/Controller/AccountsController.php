<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Account;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
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
        return $this->render('accounts\show.html.twig', [
            'account' => $account,
        ]);
    }

    #[Route('/accounts/{id}/delete', name: 'delete_account', methods: ['GET'])]
    #[IsGranted('DELETE', subject: 'account')]
    public function delete(Account $account)
    {
        return new Response('Deleting account ' . $account->getId());
    }
}
