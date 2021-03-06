<?php

declare(strict_types=1);

namespace App\Controller\Api;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiTestController
{
    /**
     * @Route("/api/test", methods={"POST", "GET"})
     * @IsGranted("ROLE_USER")
     */
    public function apiTest()
    {
        return new Response('Api Works! ');
    }
}
