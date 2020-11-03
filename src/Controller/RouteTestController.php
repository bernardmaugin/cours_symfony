<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class RouteTestController
 * @package App\Controller
 */
class RouteTestController extends AbstractController
{
    /**
     * @Route("/route/test", name="nom-de-ma-route")
     */
    public function testAction()
    {
        return new Response('<body>Contenu de la réponse</body>');
    }

    /**
     * @Route("/route/with-variable/{id}", name="nom-de-ma-route-2")
     */
    public function routeWithVariableAction($id)
    {
        // $id est accessible ici de manière automatique
        return new Response("<body>$id</body>");
    }

    /**
     * @Route(
     *     "/route/with-variable-and-default-value/{page}",
     *     defaults={"page": "1"},
     *     name="nom-de-ma-route-3"
     * )
     */
    public function withDefaultValuesAction($page)
    {
        return new Response("<body>$page</body>");
    }

    /**
     * @Route(
     *     "/route/with-variable-and-default-value-bis/{page}",
     *     name="nom-de-ma-route-4"
     * )
     */
    public function withDefaultValuesBisAction($page=1)
    {
        return new Response("<body>$page</body>");
    }

    /**
     * @Route(
     *     "/route/with-constraint/{page}",
     *     defaults={"page": "1"},
     *     requirements={"page": "\d+"},
     *     name="nom-de-ma-route-5"
     * )
     */
    public function withConstraintAction($page)
    {
        return new Response("<body>$page</body>");
    }

    /**
     * @Route(
     *     "/route/with-multiple-constraints/{year}/{month}/{filename}.{extension}",
     *     defaults={
     *         "extension": "html"
     *     },
     *     requirements={
     *         "year": "\d{4}",
     *         "month": "\d{2}",
     *         "extension": "html|xml|css|js"
     *     },
     *     name="nom-de-ma-route-6"
     * )
     */
    public function withMultipleConstraintsAction($year, $month, $filename, $extension)
    {
        return new Response("<body>$year, $month, $filename, $extension</body>");
    }

    /**
     * @Route(
     *     "/route/with-http-method-constraint/{page}",
     *     defaults={"page": "1"},
     *     requirements={"page": "\d+"},
     *     methods={"GET"},
     *     name="nom-de-ma-route-7")
     */
    public function withHttpMethodConstraintAction($page)
    {
        return new Response("<body>$page</body>");
    }
}
