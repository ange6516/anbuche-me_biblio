<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class RetourController extends Controller
{
    /**
     * @Route("/retour", name="retour")
     */
    public function indexAction()
    {
        // $request -> pour recup données
        $request = Request::createFromGlobals();
        // accés aux methodes de LivreRepository
        $repository = $this->getDoctrine()->getRepository('AppBundle:Livre');
        // recup login
        $pseudo = $request->query->get('pseudo');  

        //       recup id du livre pour le retour 
        $idLivre = $request->query->get('idLivre'); 
        $id =intval($idLivre[0]);  

        // maj dans la table livre pour mettre l'etat dulivre à zero
        $idUser = $repository-> retourLivre($id);

        //liste de tous les livres présent la BDD
        $listeLivre = $repository-> recupLivresDispo($idLivre);
        
        // affichage liste des livres
        return $this->render('livre_dispo/index.html.twig',array(

            'livreDispo' => $listeLivre,
            'pseudo' => $pseudo,
        )

            
        
            
        );
    }
}
