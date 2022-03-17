<?php

declare(strict_types=1);

namespace App\Controller\Api;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiTestController
{
    /**
     * @Route("/api/test", methods={"POST", "GET"})
     */
    public function apiTest()
    {
        return new Response('Api Works! ');
    }
}
