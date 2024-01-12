<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HttpController extends AbstractController
{
    #[Route('/', name: 'app_http')]
    public function index(): Response
    {
        return $this->render('http/index.html.twig', [
            'controller_name' => 'HttpController',
        ]);
    }

    // ici on injecte en dépendance la classe Request de HttpFoundation instanciée dans l'objet $request
    #[Route('/request', name: 'request')]
    public function request(Request $request): Response
    {
//
//        // Request est la classe de symfony qui regroupe nos superglobales de PHP (principalement pour $_GET, $_POST et $_COOKIES)
//
//        // $_GET
//        // http://127.0.0.1:8000/request?nom=desaulle&prenom=cesaire
//        // var_dump dans symfony
//        // dump()
//        // die(var_dump())
//        // dd()
//          dump($_GET);
//
//          //dd($request);
//
//        // $request->query contient un objet surcouche de $_GET
//
//        // var_dump($_GET)
//        dump($request->query->all());
//
//        // var_dump($_GET['prenom'])
//        dump($request->query->get('prenom'));
//
//        // isset($_GET['surnom'])
//        dump($request->query->has('surnom')); // false
//
//        // var_dump($_GET['surnom'])
//        dump($request->query->get('surnom')); // null pas d'erreur
//
//        dump($request->query->get('surnom', 'toto')); // valeur déclarée par defaut si l'indice n'existe pas avec $_GET on aurait eu un warning avec undefined array key.
//
//
//        dump($request->getMethod()); // renvoie la methode capté par symfony
//     dd($request);
//
        if ($request->isMethod('POST'))
        {

            dd($request->request->all());
        }

       // dump($request->request->all());
        // $request->request est la surcouche de $_POST à laquelle s'applique les mêmes méthode que $request->query


        return $this->render('http/request.html.twig', [

        ]);
    }


}
