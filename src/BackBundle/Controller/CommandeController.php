<?php

namespace BackBundle\Controller;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Ob\HighchartsBundle\Highcharts\Highchart;


class CommandeController extends Controller
{


    public function supprimerCommandeAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $modele = $em->getRepository('BackBundle:Commande')->find($id);
        $em->remove($modele);

        $em->flush();
        return $this->redirectToRoute('afficher_commande');
    }

    public function modifierCommandeAction(Request $request,$id )
    {
        $modeles = $this->getDoctrine()->getRepository('BackBundle:Commande')->find($id);
        $modeles->setTotal($modeles->getTotal());
        $modeles->setIdUser($modeles->getIdUser());
        $modeles->setAdresse($modeles->getAdresse());
        $modeles->setVille($modeles->getVille());
        $modeles->setLivreur($modeles->getLivreur());
        $modeles->setEtat($modeles->getEtat());
        $form=$this->createFormBuilder($modeles)
            ->add('total', TextType::class, array('attr' => array('class' => 'form-control'),'disabled'=>true))
            ->add('idUser', TextType::class, array('attr' => array('class' => 'form-control'),'disabled'=>true))
            ->add('adresse', TextType::class, array('attr' => array('class' => 'form-control'),'disabled'=>true))
            ->add('ville', TextType::class, array('attr' => array('class' => 'form-control'),'disabled'=>true))
            ->add('livreur', EntityType::class,array(
                'class' =>'BackBundle:Livreur',
                'choice_label'=>'nomLivreur',
                'multiple'=>false,
                'placeholder' => ' ',
                'attr' => array('class' => 'form-control')))
            ->add('etat', ChoiceType::class,
                [
                'choices' => [
                    'En cours de traitement'=>'En cours de traitement', 'En cours de livraison'=>'En cours de livraison', 'Livrée'=>'Livrée'],

                'attr' => array('class' => 'form-control')])
            ->add('save', SubmitType::class, array('label' => 'Enregistrer Modification', 'attr' => array('class' => 'btn btn-primary', 'style' => 'margin-top:10px')))
            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $total = $form['total']->getData();
            $idUser = $form['idUser']->getData();
            $adresse = $form['adresse']->getData();
            $ville = $form['ville']->getData();
            $livreur = $form['livreur']->getData();
            $etat = $form['etat']->getData();

            $em=$this->getDoctrine()->getRepository('BackBundle:Commande')->find($id);

            $modeles->setTotal($total);
            $modeles->setIdUser($idUser);
            $modeles->setAdresse($adresse);
            $modeles->setVille($ville);
            $modeles->setLivreur($livreur);
            $modeles->setEtat($etat);

            $em=$this->getDoctrine()->getManager();
            $em->flush();
            $this->addFlash('message', 'Commande modifié avec succès');
            return $this->redirectToRoute('afficher_commande');
        }
        return $this->render('@Back/Commande/modifierCommande.html.twig', [

            'form' => $form->createView()
        ]);
    }







    public function affichercommandeAction(Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $modeles=$em->getRepository('BackBundle:Commande')->findAll();

        $paginator  = $this->get('knp_paginator');
        $result = $paginator->paginate(
            $modeles,
            $request->query->getInt('page', 1), /*page number*/
            $request->query->getInt('limit',3)
        );


        return $this->render('@Back/Commande/listeCommande.html.twig',array('m'=>$result));
    }

    public function chartCommandeAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $data = $em->getRepository('BackBundle:Commande')->StatDQL();

        $ob = new Highchart();
        $ob->chart->renderTo('piechart');
        $ob->title->text('Etat des commandes');
        $ob->plotOptions->pie(array(
            'allowPointSelect' => true,
            'cursor' => 'pointer',
            'dataLabels' => array('enabled' => false),
            'showInLegend' => true
        ));

        $ob->series(array(array('type' => 'pie', 'name' => 'Browser share', 'data' => $data)));
        return $this->render('BackBundle:Commande:statCommande.html.twig', array(
            'chart' => $ob
        ));

    }

    public function chartCommandevilleAction()
    {
        $em2 = $this->getDoctrine()->getEntityManager();
        $data2 = $em2->getRepository('BackBundle:Commande')->StatvilleDQL();

        $ob2 = new Highchart();
        $ob2->chart->renderTo('piechart');
        $ob2->title->text('Nombre de commandes par ville');
        $ob2->plotOptions->pie(array(
            'allowPointSelect' => true,
            'cursor' => 'pointer',
            'dataLabels' => array('enabled' => false),
            'showInLegend' => true
        ));
        $ob2->series(array(array('type' => 'pie', 'name' => 'Browser share', 'data' => $data2)));
        return $this->render('BackBundle:Commande:statCommandeville.html.twig', array(
          'chart' => $ob2
        ));

    }

}
