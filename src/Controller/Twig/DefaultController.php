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
}