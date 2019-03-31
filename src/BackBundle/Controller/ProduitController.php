<?php

namespace BackBundle\Controller;

use BackBundle\Entity\Produits;
use BackBundle\Entity\Catalogue;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class ProduitController extends Controller
{


    public function supprimerProduitAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $modele = $em->getRepository('BackBundle:Produits')->find($id);
        $em->remove($modele);

        $em->flush();
        return $this->redirectToRoute('afficher_Produit');
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







    public function afficherProduitAction()
    {
        $em=$this->getDoctrine()->getManager();
        $modeles=$em->getRepository('BackBundle:Produits')->findAll();





        return $this->render('@Back/Produit/listeProduit.html.twig',array('m'=>$modeles));
    }
    public function ajouterProduitAction(Request $request)
    {
        $modele=new Produits();
        if($request->isMethod('POST')){

            $modele->setNom($request->get('nom'));
            $modele->setPrix($request->get('prix'));
            $modele->setPrixInitial($request->get('prix'));
            $modele->setQuantite($request->get('quantite'));
            $modele->setImage($request->get('image'));
            $modele->setCategorie($request->get('categorie'));
            $modele->setType($request->get('type'));
            $em=$this->getDoctrine()->getManager();
            $em->persist($modele);
            $em->flush();

        }
        return $this->render('@Back/Produit/ajouterProduit.html.twig');




    }


    public function afficherCatalogueAction()
    {
        $em=$this->getDoctrine()->getManager();
        $modeles=$em->getRepository('BackBundle:Catalogue')->findAll();
        return $this->render('@Back/Produit/listeCatalogue.html.twig',array('m'=>$modeles));
    }
    public function ajouterProduitCatalogueAction($id)
    {
        $modeles = $this->getDoctrine()->getRepository('BackBundle:Produits')->find($id);
        $modele=new Catalogue();
        $modele->setId($modeles->getId());
        $modele->setNom($modeles->getNom());
        $modele->setPrix($modeles->getPrix());
        $modele->setImage($modeles->getImage());
        $modele->setQuantite($modeles->getQuantite());
        $modele->setCategorie($modeles->getCategorie());
            $em=$this->getDoctrine()->getManager();
            $em->persist($modele);
            $em->flush();


        return $this->redirectToRoute('afficher_Produit');




    }


    public function supprimerProduitCatalogueAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $modele = $em->getRepository('BackBundle:Catalogue')->find($id);
        $em->remove($modele);

        $em->flush();
        return $this->redirectToRoute('afficher_Catalogue');
    }

    public function modifierProduitCatalogueAction(Request $request,$id )
    {
        $modeles = $this->getDoctrine()->getRepository('BackBundle:Catalogue')->find($id);

        $modeles->setPrix($modeles->getPrix());
        $modeles->setQuantite($modeles->getQuantite());
        $form=$this->createFormBuilder($modeles)

            ->add('prix', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('quantite', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('save', SubmitType::class, array('label' => 'Enregistrer Modification', 'attr' => array('class' => 'btn btn-primary', 'style' => 'margin-top:10px')))
            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {


            $prix = $form['prix']->getData();
            $quantite = $form['quantite']->getData();





            $em=$this->getDoctrine()->getRepository('BackBundle:Produits')->find($id);


            $modeles->setPrix($prix);
            $modeles->setQuantite($quantite);
            $em=$this->getDoctrine()->getManager();
            $em->flush();
            $this->addFlash('message', 'modifié avec succès');
            return $this->redirectToRoute('afficher_Catalogue');
        }
        return $this->render('@Back/Produit/modifierProduit.html.twig', [

            'form' => $form->createView()
        ]);
    }


}
