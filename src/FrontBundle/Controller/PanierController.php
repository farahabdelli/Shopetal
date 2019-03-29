<?php

namespace FrontBundle\Controller;

use Proxies\__CG__\FrontBundle\Entity\Lignecommande;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class PanierController extends Controller
{
    public function afficherPanierAction()
    {
        $em = $this->getDoctrine()->getManager();
        $modeles = $em->getRepository('FrontBundle:Lignecommande')->findAll();

        return $this->render('@Front/Panier/afficherPanier.html.twig', array('emm' => $modeles));
    }

    public function DQLtotalAction()
    {
        $em = $this->getDoctrine()->getManager();
        $modele = $em->getRepository('FrontBundle:Lignecommande')->SommetotalDQL();
        return $this->render('@Front/Panier/afficherPanier.html.twig', array('mm' => $modele));
    }


    public function QBtotalAction()
    {
        $em = $this->getDoctrine()->getManager();
        $modele = $em->getRepository('FrontBundle:Lignecommande')->SommetotalQB();
        return $this->redirectToRoute('afficherPanier', array('mo' => $modele));
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

}
