<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;



class CommandeController extends Controller
{

    public function afficherCommandeAction()
    {
        $em=$this->getDoctrine()->getManager();
        $modeles=$em->getRepository('FrontBundle:Commande')->findAll();



        return $this->render('@Front/Commande/afficherCommande.html.twig',array('m'=>$modeles));
    }




}
