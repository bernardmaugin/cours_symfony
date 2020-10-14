<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloWorldController
{
    /**
     * @Route("/")
     */
    public function helloWorldAction()
    {
        return new Response('Hello World !');
    }
}
