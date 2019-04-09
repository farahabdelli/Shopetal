<?php

namespace BackBundle\Controller;

use BackBundle\Entity\Jardinier;
use BackBundle\Entity\Produits;
use BackBundle\Entity\Catalogue;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Exception\RequestExceptionInterface;
use Symfony\Component\HttpFoundation\Request;


class ServicesController extends Controller
{


    public function supprimerServiceAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $modele = $em->getRepository('BackBundle:Service')->find($id);
        $em->remove($modele);

        $em->flush();
        return $this->redirectToRoute('afficher_Service');
    }

    public function modifierProduitAction(Request $request,$id )
    {
        $modeles = $this->getDoctrine()->getRepository('BackBundle:Produits')->find($id);
        $modeles->setNom($modeles->getNom());
        $modeles->setPrix($modeles->getPrix());
        $modeles->setQuantite($modeles->getQuantite());
        $modeles->setCategorie($modeles->getCategorie());
        $modeles->setType($modeles->getType());
        $form=$this->createFormBuilder($modeles)
            ->add('nom', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('prix', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('quantite', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('categorie', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('type', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('save', SubmitType::class, array('label' => 'Enregistrer Modification', 'attr' => array('class' => 'btn btn-primary', 'style' => 'margin-top:10px')))
            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $nom = $form['nom']->getData();
            $prix = $form['prix']->getData();
            $quantite = $form['quantite']->getData();
            $categorie = $form['categorie']->getData();
            $type = $form['type']->getData();




            $em=$this->getDoctrine()->getRepository('BackBundle:Produits')->find($id);

            $modeles->setNom($nom);
            $modeles->setPrix($prix);
            $modeles->setQuantite($quantite);
            $modeles->setCategorie($categorie);
            $modeles->setType($type);
            $em=$this->getDoctrine()->getManager();
            $em->flush();
            $this->addFlash('message', 'Produit modifié avec succès');
            return $this->redirectToRoute('afficher_Produit');
        }
        return $this->render('@Back/Produit/modifierProduit.html.twig', [

            'form' => $form->createView()
        ]);
    }







    public function afficherServiceAction()
    {
        $em=$this->getDoctrine()->getManager();
        $modeles=$em->getRepository('BackBundle:Service')->findAll();

        return $this->render('@Back/Services/listeServices.html.twig',array('m'=>$modeles));
    }

    public function affecterServiceAction(Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $services=$em->getRepository('BackBundle:Service')->findAll();
        $jardiniers=$em->getRepository('BackBundle:Jardinier')->findAll();

        return $this->render('@Back/Services/completerService.html.twig',array('s'=>$services,'j'=>$jardiniers));



    }



}
