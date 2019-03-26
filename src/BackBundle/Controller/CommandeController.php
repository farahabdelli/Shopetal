<?php

namespace BackBundle\Controller;

use BackBundle\Entity\Commande;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


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
            ->add('total', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('idUser', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('adresse', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('ville', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('livreur', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('etat', TextType::class, array('attr' => array('class' => 'form-control')))
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

}
