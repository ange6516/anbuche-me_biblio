<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ReserverController extends Controller
{
    /**
     * @Route("/reserver", name="reserver")
     */
    public function indexAction()
    {
        // $request -> permet recup données
        $request = Request::createFromGlobals();
        // accés methodes LivreRepository
        $repository = $this->getDoctrine()->getRepository('AppBundle:Livre');
        
       // recup l'd du livre 
       $idLivre = $request->query->get('idLivre'); 
       // recup du login
       $pseudo = $request->query->get('pseudo');  
      
       // recup id user
       $idUser = $repository-> getIdUser($pseudo);       
       
        // maj dans la table livre (id_user) du livre emprunter
        $update = $repository-> reserverLivres($idLivre,intval($idUser[0]['id']));

        // liste tous les livres de la BDD 
        $listeLivre = $repository-> recupLivresDispo();
        // affichage de liste de livres
        return $this->render('livre_dispo/index.html.twig',array(

            'livreDispo' => $listeLivre,
            'pseudo' => $pseudo,
        )

            
        
            
        );
        
        
    }
}
