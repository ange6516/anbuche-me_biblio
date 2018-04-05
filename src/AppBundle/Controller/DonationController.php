<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DonationController extends Controller
{
    /**
     * @Route("/donation", name="donation")
     */
    public function indexAction()
    {
        // $request -> pour recup de données
        $request = Request::createFromGlobals();
        // accés aux methodes dans LivreRepository
        $repository = $this->getDoctrine()->getRepository('AppBundle:Livre');

         //       recup du login   
        $pseudo = $request->query->get('pseudo');

        // recup liste de mes livres ('soumis à la communauté' )
        $listeDonation = $repository-> donation($pseudo);
        
        // vers vue -> liste des livres
        return $this->render('donation/index.html.twig',array(

            'listeDonation' => $listeDonation ,
            'pseudo' =>$pseudo,
        )
       
            
        );
    }
}
