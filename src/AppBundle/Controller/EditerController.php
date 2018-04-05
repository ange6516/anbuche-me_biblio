<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EditerController extends Controller
{
    /**
     * @Route("/editer", name="editer")
     */
    public function indexAction()
    {
         // $request -> pour recup de données
        $request = Request::createFromGlobals();
        // accés aux methodes dans LivreRepository
        $repository = $this->getDoctrine()->getRepository('AppBundle:Livre');

          //       recup du login   
        $pseudo = $request->query->get('pseudo');

        //       recup id du livre à  editer     
        $idLivre = $request->query->get('idLivre');

        // recup des infos du livre à editer
        $infoLivre = $repository-> editLivresDispo($idLivre);
        
        // affichage des infos livre
        return $this->render('editer/index.html.twig',array(

            'infoLivre' => $infoLivre ,
            'pseudo' =>$pseudo,
        )
       
            
        );
    }
}
