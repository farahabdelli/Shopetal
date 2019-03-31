<?php

namespace FrontBundle\Controller;
use FrontBundle\Entity\Lignecommande;
use FrontBundle\Entity\Commande;
use FrontBundle\Entity\Total;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


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


    public function addtocartAction( $id)
    {
        # Get object from doctrine manager

        $cart = new Lignecommande();

        $em = $this->getDoctrine()->getManager();

        $product = $this->getDoctrine()->getRepository('FrontBundle:Produits')
            ->find($id);
        $product->setQuantite($product->getQuantite()-1);
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
        $this->addFlash('message', 'Panier modifié avec succès');
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
        if($request->isMethod('POST')){
            $com->setTotal($modele);
            $com->setIdUser("user");
            $com->setAdresse($request->get('adresse'));
            $com->setVille($request->get('ville'));
            $com->setLivreur("-");
            $com->setEtat(' ');

            $em->persist($com);
            $em->flush();
            return $this->redirectToRoute('afficherCatalogue');
        }
        return $this->render('@Front/Commande/ajouterCommande.html.twig');


    }

}
