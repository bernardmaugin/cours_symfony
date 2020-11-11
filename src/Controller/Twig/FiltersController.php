<?php
namespace App\Controller\Twig;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class FiltersController
 * @package App\Controller
 * @Route("/twig")
 */
class FiltersController extends AbstractController
{
    /**
     * @Route("/filters", name="twig_filters")
     * @return Response
     */
    public function filtersAction()
    {
        return $this->render('twig/filters.html.twig', [
            'createdAt' => new \DateTime('now'),
            'name' => 'This is my name',
            'tags' => [56, 'z', 'B', 'H', 6, 92, 9, 'Test', 32],
        ]);
    }
}