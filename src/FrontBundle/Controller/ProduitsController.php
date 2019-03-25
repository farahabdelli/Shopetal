<?php

namespace FrontBundle\Controller;

use FrontBundle\Entity\Produits;
use FrontBundle\Form\ProduitsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProduitsController extends Controller
{
    public function afficheMAction()
    {
        $em=$this->getDoctrine()->getManager();
        $modeles=$em->getRepository('FrontBundle:Produits')->findAll();

        return $this->render('@Front/Produits/afficheM.html.twig',array('m'=>$modeles));
    }
    public function create2Action(Request $request)
    {
        $m=new Produits();
        $Form=$this->createForm(ProduitsType::class,$m);
        $Form->handleRequest($request);

        if($Form->isSubmitted()){

            $em=$this->getDoctrine()->getManager();
            $em->persist($m);
            $em->flush();
            return $this->redirectToRoute('afficheM');
        }
        return $this->render('@Front/Produits/Ajout2.html.twig',array('form'=>$Form->createView()));




    }
}
