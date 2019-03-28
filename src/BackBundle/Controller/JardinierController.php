<?php

namespace BackBundle\Controller;

use BackBundle\Entity\Jardinier;
use BackBundle\Form\JardinierType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class JardinierController extends Controller
{


    public function supprimerJardinierAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $modele = $em->getRepository('BackBundle:Jardinier')->find($id);
        $em->remove($modele);

        $em->flush();
        return $this->redirectToRoute('afficher_jardinier');
    }
    public function modifierJardinierAction(Request $request,$id)
    {
        $em=$this->getDoctrine()->getManager();

        $m=$em->getRepository('BackBundle:Jardinier')->find($id);

        $Form = $this->createForm(JardinierType::class,$m);
        $Form->handleRequest($request);
        if ($Form->isSubmitted()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($m);
            $em->flush();
        }
        return $this->render('@Back\Jardinier\modifJardinier.html.twig',array('form'=>$Form->createView()));


    }


    public function afficherJardinierAction()
    {
        $em=$this->getDoctrine()->getManager();
        $modeles=$em->getRepository('BackBundle:Jardinier')->findAll();

        return $this->render('@Back/Jardinier/listeJardiniers.html.twig',array('m'=>$modeles));
    }

    public function modifierLivreurAction(Request $request,$id )
    {
        $modeles = $this->getDoctrine()->getRepository('BackBundle:Livreur')->find($id);
        $modeles->setNomLivreur($modeles->getNomLivreur());
        $modeles->setMailLivreur($modeles->getMailLivreur());
        $modeles->setTelLivreur($modeles->getTelLivreur());
        $modeles->setDisponibilite($modeles->getDisponibilite());
        $form=$this->createFormBuilder($modeles)
            ->add('nomLivreur', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('mailLivreur', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('telLivreur', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('disponibilite', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('save', SubmitType::class, array('label' => 'Enregistrer Modification', 'attr' => array('class' => 'btn btn-primary', 'style' => 'margin-top:10px')))
            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $nomLivreur = $form['nomLivreur']->getData();
            $mailLivreur = $form['mailLivreur']->getData();
            $telLivreur = $form['telLivreur']->getData();
            $disponibilite = $form['disponibilite']->getData();




            $em=$this->getDoctrine()->getRepository('BackBundle:Livreur')->find($id);

            $modeles->setNomLivreur($nomLivreur);
            $modeles->setMailLivreur($mailLivreur);
            $modeles->setTelLivreur($telLivreur);
            $modeles->setDisponibilite($disponibilite);

            $em=$this->getDoctrine()->getManager();
            $em->flush();
            $this->addFlash('message', 'Livreur modifié avec succès');
            return $this->redirectToRoute('afficher_livreur');
        }
        return $this->render('@Back/Livreur/modifierLivreur.html.twig', [

            'form' => $form->createView()
        ]);
    }


    public function ajouterJardinierAction(Request $request)
    {
        $modele=new Jardinier();
        if($request->isMethod('POST')){
           // $modele->setIdLivreur($request->get('idLivreur'));
            $modele->setNom($request->get('nom'));
            $modele->setPrenom($request->get('prenom'));
            $modele->setNumero($request->get('numero'));
            $modele->setDisponibilite(0);

            $em=$this->getDoctrine()->getManager();
            $em->persist($modele);
            $em->flush();
            return $this->redirectToRoute('afficher_jardinier');
        }
        return $this->render('@Back/Jardinier/ajouterJardinier.html.twig');




    }
}
