<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    /**
     * @Route("/homepage", name="app_homepage")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        return $this->render('app/index.html.twig', [
            'user' => $this->getUser(),
        ]);
    }

    /**
     * @Route("/pageexample", name="app_pageexample")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function pageExample()
    {
        return $this->render('app/page_example.html.twig', [
            'user' => $this->getUser(),
        ]);
    }
}
