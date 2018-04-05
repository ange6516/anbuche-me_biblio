<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EmpruntController extends Controller
{
    /**
     * @Route("/emprunt", name="emprunt")
     */
    public function indexAction()
    {
        // $request -> pour recup de données
        $request = Request::createFromGlobals();

        // accés aux methode dans LivreRepository
        $repository = $this->getDoctrine()->getRepository('AppBundle:Livre');

        //recu  login
        $pseudo = $request->query->get('pseudo');

        //       recup id user    
        $idLivre = $request->query->get('pseudo');
        $idUser = $repository-> getIdUser($idLivre);
        $user =intval($idUser[0]['id']);        

        // liste les livres emprunter
        $emprunt = $repository-> mesEmprunt($user);
        
        //affichage des livres emprunés
        return $this->render('emprunt/index.html.twig',array(

            'emprunt' => $emprunt ,
            'pseudo' => $pseudo,
        )
       
            
        );
    }
}
