<?php

namespace FrontBundle\Controller;
use FrontBundle\Entity\Lignecommande;
use FrontBundle\Entity\Commande;
use FrontBundle\Entity\Total;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class PanierController extends Controller
{
    public function afficherPanierAction()
    {
        $em = $this->getDoctrine()->getManager();
        $fm = $this->getDoctrine()->getManager();
        $modeles = $em->getRepository('FrontBundle:Lignecommande')->findAll();
        $modele = $fm->getRepository('FrontBundle:Lignecommande')->totalDQL();

        return $this->render('@Front/Panier/afficherPanier.html.twig', array('emm' => $modeles , 'mm' => $modele));
    }


    public function addtocartAction(Request $request , $id)
    {
        # Get object from doctrine manager

        $cart = new Lignecommande();

        $em = $this->getDoctrine()->getManager();

        $product = $this->getDoctrine()->getRepository('FrontBundle:Catalogue')
            ->find($id);
        $product->setQuantite($product->getQuantite()-1);
        $cart->setIdProduit($product->getId());
        $cart->setNomProduit($product->getNom());
        $cart->setPrixProduit($product->getPrix());

        $cart->setQuantiteLignecommande(1);
        $cart->setPrixPanier($product->getPrix());
        $em->persist($cart);
        $em->flush();
        $this->sendNotification($request);
        return $this->redirectToRoute('afficherCatalogue');

    }

    public function supprimerPanierAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $modele = $em->getRepository('FrontBundle:Lignecommande')->find($id);

        $em->remove($modele);

        $this->forward('FrontBundle:Catalogue:diminuerQuantite');
        $em->flush();
        return $this->redirectToRoute('afficherPanier');
    }

        public function modifierPanierplusAction($id)

        {
            $em=$this->getDoctrine()->getManager();
            $panier = $this->getDoctrine()->getRepository('FrontBundle:Lignecommande')->find($id);
            $panier->setQuantiteLignecommande($panier->getQuantiteLignecommande()+1);
            $panier->setPrixPanier($panier->getPrixPanier()+$panier->getPrixProduit());

                $em->flush();
                $this->addFlash('message', 'Panier modifié avec succès');
                return $this->redirectToRoute('afficherPanier');
        }

    public function modifierPaniermoinsAction($id)

    {
        $em=$this->getDoctrine()->getManager();
        $panier = $this->getDoctrine()->getRepository('FrontBundle:Lignecommande')->find($id);
        $panier->setQuantiteLignecommande($panier->getQuantiteLignecommande()-1);
        $panier->setPrixPanier($panier->getPrixPanier()-$panier->getPrixProduit());

        $em->flush();
        $this->addFlash('messages', 'Panier modifié avec succès');
        return $this->redirectToRoute('afficherPanier');
    }

    public function ajouterCommandeAction(Request $request)
    {

        $fm = $this->getDoctrine()->getManager();
        $modele = $fm->getRepository('FrontBundle:Lignecommande')->SommetotalDQL();
        $em = $this->getDoctrine()->getManager();
        $total=new Total();
        $total->setTotal($modele);
        $em->persist($total);

        $com = new Commande();
        $com->setTotal($modele);
        $com->setIdUser($this->getUser());
        $com->setEtat(' ');


        $form=$this->createFormBuilder($com)
            ->add('adresse', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('ville', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('livreur', EntityType::class,array(
                'class' =>'FrontBundle:Livreur',
                'choice_label'=>'nomLivreur',
                'multiple'=>false,
                'label'=>false,
                'attr' => array('class' => 'invisible')))
            ->add('save', SubmitType::class, array('label' => 'Valider', 'attr' => array('class' => 'btn btn-primary', 'style' => 'margin-top:10px')))
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($com);
            $em->flush();
            return $this->redirectToRoute('afficherCatalogue');

        }
        return $this->render('@Front/Commande/ajouterCommande.html.twig',  [

            'form2' => $form->createView()
        ]);


    }
    public function sendNotification(Request $request)
    {
        $manager = $this->get('mgilet.notification');
        $notif = $manager->createNotification('Hello world !');
        $notif->setMessage('This a notification.');
        $notif->setLink('http://symfony.com/');

        $manager->addNotification(array($this->getUser()), $notif, true);

    }

}
