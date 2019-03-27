<?php

namespace FrontBundle\Controller;

use FrontBundle\Entity\Produits;
use FrontBundle\Form\ProduitsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProduitController extends Controller
{
    public function afficherProduitAction()
    {
        $em=$this->getDoctrine()->getManager();
        $modeles=$em->getRepository('BackBundle:Produits')->findAll();





        return $this->render('@Front/Produit/listeProduit.html.twig',array('m'=>$modeles));
    }

}
