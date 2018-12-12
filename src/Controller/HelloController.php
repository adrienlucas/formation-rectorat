<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController
{
    /**
     * @Route("/salut-a-toi/{name}", name="hello")
     */
    public function index(string $name = null)
    {
        $text = 'Salut à toi '. ($name ?? 'Anonymous');
        $text = 'Salut à toi '. (isset($name) ? $name : 'Anonymous');
        return new Response();
    }
}
