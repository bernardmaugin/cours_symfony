<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class RouteTestBisController
 * @package App\Controller
 *
 * @Route("/route-bis")
 */
class RouteTestBisController extends AbstractController
{
    /**
     * @Route("/test", name="nom-de-ma-route-bis")
     * En réalité, la route de cette action sera /route-bis/test
     */
    public function testAction()
    {
        return new Response('<body>Contenu de la réponse</body>');
    }

    /**
     * @Route("/with-variable/{id}", name="nom-de-ma-route-2-bis")
     * En réalité, la route de cette action sera /route-bis/with-variable/{id}
     */
    public function routeWithVariableAction($id)
    {
        // $id est accessible ici de manière automatique
        return new Response("<body>$id</body>");
    }

    /**
     * @Route(
     *     "/with-variable-and-default-value/{page}",
     *     defaults={"page": "1"},
     *     name="nom-de-ma-route-3-bis"
     * )
     */
    public function withDefaultValuesAction($page)
    {
        return new Response("<body>$page</body>");
    }

    /**
     * @Route(
     *     "/with-variable-and-default-value-bis/{page}",
     *     name="nom-de-ma-route-4-bis"
     * )
     */
    public function withDefaultValuesBisAction($page=1)
    {
        return new Response("<body>$page</body>");
    }

    /**
     * @Route(
     *     "/with-constraint/{page}",
     *     defaults={"page": "1"},
     *     requirements={"page": "\d+"},
     *     name="nom-de-ma-route-5-bis"
     * )
     */
    public function withConstraintAction($page)
    {
        return new Response("<body>$page</body>");
    }

    /**
     * @Route(
     *     "/with-multiple-constraints/{year}/{month}/{filename}.{extension}",
     *     defaults={
     *         "extension": "html"
     *     },
     *     requirements={
     *         "year": "\d{4}",
     *         "month": "\d{2}",
     *         "extension": "html|xml|css|js"
     *     },
     *     name="nom-de-ma-route-6-bis"
     * )
     */
    public function withMultipleConstraintsAction($year, $month, $filename, $extension)
    {
        return new Response("<body>$year, $month, $filename, $extension</body>");
    }

    /**
     * @Route(
     *     "/with-http-method-constraint/{page}",
     *     defaults={"page": "1"},
     *     requirements={"page": "\d+"},
     *     methods={"GET"},
     *     name="nom-de-ma-route-7-bis")
     */
    public function withHttpMethodConstraintAction($page)
    {
        return new Response("<body>$page</body>");
    }
}
