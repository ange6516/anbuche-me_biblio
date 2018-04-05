<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class Livres_DispoController extends Controller
{
   

    /**
     * @Route("/livre_dispo", name="livre_dispo")
     */
    public function indexAction()
    {
        // $request -> pour recup de données
        $request = Request::createFromGlobals();
        // acces aux methodes de LivreRepository
        $repository = $this->getDoctrine()->getRepository('AppBundle:Livre'); 
        // recup login
        $pseudo = $request->query->get('pseudo');   
        
        //liste de tout les livres dispo dans la BDD
        $listeLivre = $repository-> recupLivresDispo();
        
        //afficha de la liste des livres
        return $this->render('livre_dispo/index.html.twig',array(

            'livreDispo' => $listeLivre,
            'pseudo' => $pseudo,
        )

            
        
            
        );
    }
}