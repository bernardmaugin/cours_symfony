<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DefaultController
 * @package App\Controller
 */
class DefaultController
{
    /**
     * @Route("/my-404", name="my_404")
     * @return Response
     */
    public function my404Action()
    {
        $response = new Response(); // Initialisation de la réponse
        $response->setStatusCode(Response::HTTP_NOT_FOUND); // Code de la réponse
        $response->setContent('Ma page 404'); // Contenu de la réponse
        return $response; // Retour de la réponse
    }

    /**
     * @Route("/display-results/{page}", defaults={"page": 1}, requirements={"page": "\d+"}, name="display_results")
     */
    public function displayResultsAction($page)
    {
        // La page DOIT être un entier strictement positif (les requirements s'assurent uniquement du fait que la
        // variable est composée de chiffres)
        if($page < 1) {
            throw new NotFoundHttpException("La page $page n'existe pas");
        }

        return new Response("<body>Affichage de la page $page</body>");
    }

}
