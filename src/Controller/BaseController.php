<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// une route déclarée sur controller préfixe toute les routes déclarées dans le controlleur
#[Route('/base')]
class BaseController extends AbstractController
{
    // pour accéder à cette méthode mon url sera 127.0.0.1:8000/base
    // le name d'une route n'est pas obligatoire, si il n'est pas précisé on pourra accéder à la méthode par convention avec: app_nomDuController_nomDeLaMethode
    #[Route('/', name: 'app_base')]
    public function index(): Response
    {
        // la méthode render est une méthode héritée de l'abstractController qui en 1er paramètre obligatoire l'emplacement du fichier twig à partir du dossier templates
        // le second argument optionnel est un tableau qui permet de transmettre à nos fichiers twig des informations, les indices seront le nom des variables utilisables dans notre twig et les valeurs ce que l'on souhaite y affecter peu importe le type.

        // ici on renvoie une variable controller_name qui aura pour valeur BaseController
        return $this->render('base/index.html.twig', [
            'controller_name' => 'BaseController',
        ]);
    }

// avant PHP8 et donc avant symfony 6 utilisation des annotations à la place des attributs
// les doubles quotes étaient obligatoire alors qu'à présent seules les simples sont acceptées

//    /**
//     * @return void
//     * @Route("/", name="app_base")
//     */
//    public function test():Response
//    {
//
//
//        return $this->render('base/index.html.twig', [
//            'controller_name' => 'BaseController',
//        ]);
//    }


    // partie variable de l'url entre {}
    // pour récupérer la valeur de {qui} il va falloir l'injecter en dépendance dans les
    //() de la fonction avec le même nom mais sous forme de variable
    #[Route('/hello/{qui}', name: 'hello')]
    public function hello($qui): Response
    {


        return $this->render('base/hello.html.twig', [
            "nom" => $qui
        ]);
    }


    #[Route('/salut/{qui}', name: 'salut')]
    public function salut($qui = "à toi"): Response
    {


        return $this->render('base/salut.html.twig', [
            "nom" => $qui
        ]);
    }

    //  2 parties variables dans l'url dont la dernière optionnelle
    #[Route('/coucou/{prenom}/{nom}', defaults: ['nom' => ''], name: 'coucou')]
    public function coucou($nom, $prenom): Response
    {


        return $this->render('base/coucou.html.twig', [
            "nom" => $nom,
            "prenom" => $prenom
        ]);
    }


    // on impose par expression régulière que le paramètre soit un entier
    #[Route('/editUser/{id}',requirements: ['id'=> "\d+"], name: 'editUser')]
    public function editUser($id): Response
    {


        return $this->render('base/editUser.html.twig', [
            'id'=>$id
        ]);
    }






}
