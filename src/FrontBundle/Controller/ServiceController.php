<?php

namespace FrontBundle\Controller;

use FrontBundle\Entity\Listeservices;
use FrontBundle\Entity\Service;
use FrontBundle\Form\ListeservicesType;
use FrontBundle\Form\ServiceType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class ServiceController extends Controller
{
    public function indexAction()
    {
        return $this->render('FrontBundle:Default:index.html.twig');
    }
    public function layoutAction()
    {
        return $this->render('@Front/layout.html.twig');
    }
    public function ajouterServiceAction(Request $request)
    {
        $m = new Listeservices();
        $Form = $this->createForm(ListeservicesType::class,$m);
        $Form->handleRequest($request);

        if ($Form->isSubmitted()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($m);
            $em->flush();
        }
        return $this->render('@Front/Services/AjouterService.html.twig',array('form'=>$Form->createView()));


    }
}
