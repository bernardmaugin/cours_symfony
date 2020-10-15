<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HelloWorldTwigController extends AbstractController
{
    /**
     * @Route("/twig")
     */
    public function helloWorldAction()
    {
        return $this->render('hello_world.html.twig');
    }
}
