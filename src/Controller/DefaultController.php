<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DefaultController
 * @package App\Controller
 */
class DefaultController extends AbstractController
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

    /**
     * @Route("/test-redirect")
     * @return RedirectResponse
     */
    public function testRedirectAction()
    {
        return new RedirectResponse($this->get('router')->generate('hello'));
    }

    /**
     * @Route("/test-redirect-bis")
     * @return RedirectResponse
     */
    public function testRedirectBisAction()
    {
        return $this->redirect($this->get('router')->generate('hello'));
    }

    /**
     * @Route("/test-redirect-ter")
     * @return RedirectResponse
     */
    public function testRedirectTerAction()
    {
        return $this->redirectToRoute('hello');
    }

    /**
     * @Route("/test-response-json")
     * @return JsonResponse
     */
    public function sendJsonAction()
    {
        // Ne pas oublier dans ce cas le use nécessaire : Symfony\Component\HttpFoundation\JsonResponse;
        return new JsonResponse(['toto' => 'titi']);
    }

    /**
     * @Route("/test-response-json-bis")
     * @return Response
     */
    public function sendJsonBisAction()
    {
        // Initialisation de la réponse avec le contenu attendu : du JSON
        $response = new Response(json_encode(['toto' => 'titi']));

        // Définition du Content-Type
        $response->headers->set('Content-Type', 'application/json');

        // Retour de la réponse
        return $response;
    }

    /**
     * @Route("/test-session")
     * @param Request $request
     * @return Response
     */
    public function testSessionAction(Request $request)
    {
        // Récupération de la session
        $session = $request->getSession();

        // Accès à une variable de la session
        // Uniquement à la première exécution, variable vide (cf. instruction suivante)
        dump($session->get('toto'));

        // Définition d'une variable en session
        // Une fois l'action exécutée au moins une fois, cette ligne peut être retirée et le dump()
        // ci-dessus continuera à afficher la valeur 1234 (tant que la session ne sera pas détruite)
        $session->set('toto', 1234);

        return new Response('<body></body>');
    }


    /**
     * @Route("/test-session-bis")
     * @param Session $session
     * @return Response
     */
    public function testSessionBisAction(Session $session)
    {
        // Autre manière de récupérer la session : paramètre du contrôleur
        dump($session->get('toto'));
        $session->set('toto', 1234);
        return new Response('<body></body>');
    }

    /**
     * @Route("/test-flash")
     * @param Session $session
     * @return Response
     */
    public function testFlashCrudAction(Session $session)
    {
        // ... faire un traitement particulier

        // valeur 'info' libre : c'est le développeur qui choisit ses étiquettes
        $session->getFlashBag()->add('info', "Tout s'est bien passé :-)");

        // Méthode équivalente :
        $this->addFlash('info', "Tout s'est vraiment bien passé :-)");

        return $this->redirectToRoute('test_flash_result');
    }

    /**
     * @Route("/test-flash-result", name="test_flash_result")
     * @param Session $session
     * @return void
     */
    public function testFlashResultAction(Session $session)
    {
        return $this->render('test_flash_bag.html.twig');
    }

}
