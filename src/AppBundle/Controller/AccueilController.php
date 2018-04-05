<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class AccueilController extends Controller
{
    /**
     * @Route("/accueil", name="accueil")
     */
    public function indexAction()
    {

        // recup du pseudo
        $request = Request::createFromGlobals();
        $pseudo = $request->query->get('pseudo');

        // recup url photo du user
        $repository = $this->getDoctrine()->getRepository('AppBundle:User');
        $getPhoto = $repository-> getPhotoUser($pseudo);
        $linkPhoto = $getPhoto[0]['photo'];        

        // envoi vers la vue 
        
        return $this->render('authentification/index.html.twig',array(

            'pseudo'=> $pseudo,
            'linkPhoto' => $linkPhoto,
        )
           
        );
    }
}
