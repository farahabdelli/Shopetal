<?php

namespace FrontBundle\Controller;
use FrontBundle\Entity\Lignecommande;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class PanierController extends Controller
{
    public function afficherPanierAction()
    {
        $em = $this->getDoctrine()->getManager();
        $fm = $this->getDoctrine()->getManager();
        $modeles = $em->getRepository('FrontBundle:Lignecommande')->findAll();
        $modele = $fm->getRepository('FrontBundle:Lignecommande')->SommetotalDQL();

        return $this->render('@Front/Panier/afficherPanier.html.twig', array('emm' => $modeles , 'mm' => $modele));
    }


    public function addtocartAction( $id)
    {
        # Get object from doctrine manager

        $cart = new Lignecommande();

        $em = $this->getDoctrine()->getManager();

        $product = $this->getDoctrine()->getRepository('FrontBundle:Produits')
            ->find($id);

        $cart->setIdProduit($product->getId());
        $cart->setNomProduit($product->getNom());
        $cart->setPrixProduit($product->getPrix());

        $cart->setQuantiteLignecommande(1);
        $cart->setPrixPanier($product->getPrix());
        $em->persist($cart);
        $em->flush();
        return $this->redirectToRoute('afficherCatalogue');

    }

    public function supprimerPanierAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $modele = $em->getRepository('FrontBundle:Lignecommande')->find($id);
        $em->remove($modele);

        $em->flush();
        return $this->redirectToRoute('afficherPanier');
    }

        public function modifierPanierAction()

        {
            # Get object from doctrine manager


            $em = $this->getDoctrine()->getManager();

            $product = $this->getDoctrine()->getRepository('FrontBundle:Produits')
                ->find($id);

            $cart->setIdProduit($product->getId());
            $cart->setNomProduit($product->getNom());
            $cart->setPrixProduit($product->getPrix());

            $cart->setQuantiteLignecommande(1);
            $cart->setPrixPanier($product->getPrix());
            $em->persist($cart);
            $em->flush();
            return $this->redirectToRoute('afficherCatalogue');

        }

}
