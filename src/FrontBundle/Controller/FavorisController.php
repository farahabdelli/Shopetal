<?php

namespace FrontBundle\Controller;

use FrontBundle\Entity\Favoris;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class FavorisController extends Controller
{
    public function afficherFavorisAction()
    {
        $em = $this->getDoctrine()->getManager();
        $modeles = $em->getRepository('FrontBundle:Favoris')->findAll();

        return $this->render('@Front/Favoris/afficherFavoris.html.twig', array('emm' => $modeles));
    }


    public function addtofavorisAction( $id)
    {
        # Get object from doctrine manager
        $fav = new Favoris();

        $em = $this->getDoctrine()->getManager();

        $product = $this->getDoctrine()->getRepository('FrontBundle:Catalogue')
            ->find($id);

        $fav->setIdProduit($product->getId());
        $fav->setNomProduit($product->getNom());
        $fav->setImageProduit($product->getImage());
        $fav->setPrixProduit($product->getPrix());


        $em->persist($fav);
        $em->flush();
        return $this->redirectToRoute('afficherCatalogue');

    }

    public function supprimerFavorisAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $modele = $em->getRepository('FrontBundle:Favoris')->find($id);
        $em->remove($modele);

        $em->flush();
        return $this->redirectToRoute('afficherFavoris');
    }

}
