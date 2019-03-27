<?php

namespace FrontBundle\Controller;

use FrontBundle\Entity\Produits;
use FrontBundle\Form\ProduitsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProduitController extends Controller
{
    public function afficherCatalogueAction()
    {
        $em=$this->getDoctrine()->getManager();
        $modeles=$em->getRepository('BackBundle:Catalogue')->findAll();





        return $this->render('@Front/Produit/listeProduit.html.twig',array('m'=>$modeles));
    }

}
