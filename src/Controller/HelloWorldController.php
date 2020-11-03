<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
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

    /**
     * @Route("hello")
     * @param Request $request
     * @return Response
     */
    public function helloWorldBisAction(Request $request)
    {
        dump($request->query->get('toto'));
        return new Response('Hello World !');
    }
}
