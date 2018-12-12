<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Log\Logger;
use Symfony\Component\Routing\Annotation\Route;

class HomePageController extends AbstractController
{
    public function __construct(LoggerInterface $logger)
    {
        $logger->emergency('The controller has been called');
    }

    /**
     * @Route("/", name="home_page")
     */
    public function index()
    {
        $myVariableThatMeanSomething = 'something';
        if ($myVariableThatMeanSomething=='') {

        }
        return $this->render('index.html.twig');
    }

    /**
     * @Route("/about", name="about")
     */
    public function about(array $tableauDesUtilisateurs)
    {
        return new Response('Formation rectorat');
    }
}
