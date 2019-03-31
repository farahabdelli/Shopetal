<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProduitController extends Controller
{
    public function afficherCatalogueAction()
    {
        $em=$this->getDoctrine()->getManager();
        $modeles=$em->getRepository('FrontBundle:Catalogue')->findAll();





        return $this->render('@Front/Produit/listeProduit.html.twig',array('m'=>$modeles));
    }
    public function  rechercherCatalogueAction(Request $request )
    {
        $em=$this->getDoctrine()->getManager();

        $motcle=$request->get('motcle');
        $modeles=$em->getRepository('FrontBundle:Produits')->findBy(array('nom'=>$motcle));



        return $this->render('@Front/Produit/listeProduit.html.twig',array('m'=>$modeles));

    }

    public function  afficherCategorieFleurAction()
    {
        $em=$this->getDoctrine()->getManager();


        $modeles=$em->getRepository('FrontBundle:Catalogue')->findBy(array('categorie'=>'Fleurs'));



        return $this->render('@Front/Produit/listeProduit.html.twig',array('m'=>$modeles));

    }

    public function  afficherCategoriePlantesAction()
    {
        $em=$this->getDoctrine()->getManager();


        $modeles=$em->getRepository('FrontBundle:Catalogue')->findBy(array('categorie'=>'Plantes'));



        return $this->render('@Front/Produit/listeProduit.html.twig',array('m'=>$modeles));

    }
}
