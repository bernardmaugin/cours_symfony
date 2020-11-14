<?php
namespace App\Controller\Twig;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DefaultController
 * @package App\Controller\Twig
 * @Route("/twig")
 */
class DefaultController extends AbstractController
{
    /**
     * @Route("/functions", name="twig_functions")
     * @return Response
     */
    public function functionsAction()
    {
        return $this->render('twig/functions.html.twig');
    }

    /**
     * @Route("/conditions/{stock}", name="twig_conditions")
     * @return Response
     */
    public function conditionsAction($stock)
    {
        return $this->render('twig/conditions.html.twig', ['stock' => $stock]);
    }
}