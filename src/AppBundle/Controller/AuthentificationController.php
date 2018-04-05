<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AuthentificationController extends Controller
{
    
    

    /**
     * @Route("/authentification", name="authentification")
     */
    public function indexAction()
    {
        // permet accés aux methodes dans user repository
        $repository = $this->getDoctrine()->getRepository('AppBundle:User');

        // recup du login & password du formulaire de connexion
         $pseudo = $_POST['login'];
         $pass = $_POST['password'];                 
         
         // verif si le login & password sont présent dans la BDD
         $verifAuthentif = $repository-> connexion($pseudo,$pass);
         $getPhoto = $repository-> getPhotoUser($pseudo);
         $linkPhoto = $getPhoto[0]['photo'];        

        // Si login & password ok -> accés à la page utilisateur
        if ($verifAuthentif ==true) {
         return $this->render('authentification/index.html.twig',array(
             'pseudo' => $pseudo,
             'password' => $pass,
             'verifAuthentif' => $verifAuthentif,
             'message' => "",
             'linkPhoto' => $linkPhoto,
          ) );

        }

        // si login ou password n'existe pas dans la BDD -> message d'erreur ->retourformulaire
        elseif ($verifAuthentif == false ){

            return $this->render('login/index.html.twig',array(
                'message'=> "connexion impossible",
            )
            
        );


        }
           
      

        
    }
}