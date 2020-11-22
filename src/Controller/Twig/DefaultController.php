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
    const TOTO = 10;

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

    /**
     * @Route("/conditions-for/{nbProducts}", name="twig_conditions_for")
     * @return Response
     */
    public function conditionsForAction($nbProducts)
    {
        $products = [];
        for($i=1 ; $i<=$nbProducts ; $i++) {
            $products[] = [
                'name' => "Produit $i",
                'description' => "Description $i",
                'active' => (boolean)rand(0, 1),
            ];
        }
        return $this->render('twig/conditions-for.html.twig', ['products' => $products]);
    }

    /**
     * @Route("/loop", name="twig_loop")
     * @return Response
     */
    public function loopAction()
    {
        return $this->render('twig/loop.html.twig');
    }

    /**
     * @Route("/operators", name="twig_operators")
     * @return Response
     */
    public function operatorsAction()
    {
        return $this->render('twig/operators.html.twig');
    }

    /**
     * @Route("/tests", name="twig_tests")
     * @return Response
     */
    public function testsAction()
    {
        return $this->render('twig/tests.html.twig');
    }
}