<?php

namespace BackBundle\Controller;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\PieChart;


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







    public function affichercommandeAction()
    {
        $em=$this->getDoctrine()->getManager();
        $modeles=$em->getRepository('BackBundle:Commande')->findAll();





        return $this->render('@Back/Commande/listeCommande.html.twig',array('m'=>$modeles));
    }

    public function chartCommandeAction()
    {

     //   $em = $this->getDoctrine()->getManager();
      //  $modeles=$em->getRepository('BackBundle:Commande')->StatDQL();



        //var_dump($resultat);


        $pieChart = new PieChart();
        $pieChart->getData()->setArrayToDataTable(
            [['Task', 'Hours per Day'],
                ['En cours de traitement',     11],
                ['En cours de livraison',      2],
                ['Livrée',  2]

            ]
        );

        $pieChart->getOptions()->setTitle('Etats des commandes');
        $pieChart->getOptions()->setHeight(500);
        $pieChart->getOptions()->setWidth(900);
        $pieChart->getOptions()->getTitleTextStyle()->setBold(true);
        $pieChart->getOptions()->getTitleTextStyle()->setColor('#009900');
        $pieChart->getOptions()->getTitleTextStyle()->setItalic(true);
        $pieChart->getOptions()->getTitleTextStyle()->setFontName('Arial');
        $pieChart->getOptions()->getTitleTextStyle()->setFontSize(20);

        return $this->render('BackBundle:Commande:statCommande.html.twig', array('piechart' => $pieChart));
    }

}
