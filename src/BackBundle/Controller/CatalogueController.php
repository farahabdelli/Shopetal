<?php

namespace FrontBundle\Controller;

use BackBundle\Entity\Produits;
use BackBundle\Entity\Catalogue;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CatalogueController extends Controller
{


    public function afficherCatalogueAction()
    {
        $em=$this->getDoctrine()->getManager();
        $modeles=$em->getRepository('BackBundle:Catalogue')->findAll();
        return $this->render('@Back/Produit/listeCatalogue.html.twig',array('m'=>$modeles));
    }



}
