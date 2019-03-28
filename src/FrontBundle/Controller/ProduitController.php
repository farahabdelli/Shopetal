<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class ProduitController extends Controller
{
    public function afficherCatalogueAction()
    {
        $em=$this->getDoctrine()->getManager();
        $modeles=$em->getRepository('FrontBundle:Produits')->findAll();





        return $this->render('@Front/Produit/listeProduit.html.twig',array('m'=>$modeles));
    }

}
