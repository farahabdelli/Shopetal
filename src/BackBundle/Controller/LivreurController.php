<?php

namespace BackBundle\Controller;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use BackBundle\Entity\Livreur;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class LivreurController extends Controller
{


    public function supprimerLivreurAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $modele = $em->getRepository('BackBundle:Livreur')->find($id);
        $em->remove($modele);

        $em->flush();
        return $this->redirectToRoute('afficher_livreur');
    }

    public function modifierLivreurAction(Request $request,$id )
    {
        $modeles = $this->getDoctrine()->getRepository('BackBundle:Livreur')->find($id);
        $modeles->setNomLivreur($modeles->getNomLivreur());
        $modeles->setMailLivreur($modeles->getMailLivreur());
        $modeles->setTelLivreur($modeles->getTelLivreur());
        $modeles->setDisponibilite($modeles->getDisponibilite());
        $form=$this->createFormBuilder($modeles)
            ->add('nomLivreur', TextType::class, array('attr' => array('class' => 'form-control'),'disabled'   => true))
            ->add('mailLivreur', TextType::class, array('attr' => array('class' => 'form-control'),'disabled'   => true))
            ->add('telLivreur', TextType::class, array('attr' => array('class' => 'form-control'),'disabled'   => true))
            ->add('disponibilite', ChoiceType::class,
                [
                    'choices' => [
                        'Non disponible'=>'Non disponible', 'Disponible'=>'Disponible'],

                    'attr' => array('class' => 'form-control')])
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


    public function afficherlivreurAction()
    {
        $em=$this->getDoctrine()->getManager();
        $modeles=$em->getRepository('BackBundle:Livreur')->findAll();

        return $this->render('@Back/Livreur/listelivreur.html.twig',array('m'=>$modeles));
    }




    public function ajouterlivreurAction(Request $request)
    {
        $modele=new Livreur();
        if($request->isMethod('POST')){
           // $modele->setIdLivreur($request->get('idLivreur'));
            $modele->setNomLivreur($request->get('nomLivreur'));
            $modele->setMailLivreur($request->get('mailLivreur'));
            $modele->setTelLivreur($request->get('telLivreur'));
            $modele->setDisponibilite($request->get('disponibilite'));

            $em=$this->getDoctrine()->getManager();
            $em->persist($modele);
            $em->flush();
            return $this->redirectToRoute('afficher_livreur');
        }
        return $this->render('@Back/Livreur/ajouterlivreur.html.twig');




    }
}
