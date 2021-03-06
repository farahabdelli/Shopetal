<?php

namespace BackBundle\Controller;
use BackBundle\Entity\Offres;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\PropertyAccess\PropertyAccess;





class OffreController extends Controller
{


    function generateRandomString(){
        $length = 8;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }



    public function RandomString($length = 16, $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
    {
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }



    public function supprimerOffreAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $modele = $em->getRepository('BackBundle:Offres')->find($id);
        $em->remove($modele);

        $em->flush();
        return $this->redirectToRoute('afficherOffre');
    }

    public function modifierOffreAction(Request $request,$id )
    {
        $modeles = $this->getDoctrine()->getRepository('BackBundle:Offres')->find($id);
        $modeles->setId($modeles->getId());
        $modeles->setCategorie($modeles->getCategorie());
        $modeles->setCible($modeles->getCible());
        $modeles->setTaux($modeles->getTaux());
        $modeles->setDateDebut2($modeles->getDateDebut());
        $modeles->setDateFin2($modeles->getDateFin());
        $form=$this->createFormBuilder($modeles)
            ->add('id', TextType::class, array('attr' => array('class' => 'form-control'),'disabled' => true ))
            ->add('categorie', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('cible', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('taux', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('dateDebut', DateType::class,array('label' => 'dateDebut', 'widget' => 'single_text', 'html5' => false,
                'attr' => array('class' => 'form-control')))
            ->add('dateFin', DateType::class,array('label' => 'dateFin', 'widget' => 'single_text', 'html5' => false,
                'attr' => array('class' => 'form-control')))
            ->add('save', SubmitType::class, array('label' => 'Enregistrer Modification', 'attr' => array('class' => 'btn btn-primary', 'style' => 'margin-top:10px')))
            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $id = $form['id']->getData();
            $categorie = $form['categorie']->getData();
            $cible = $form['cible']->getData();
            $taux = $form['taux']->getData();
            $dateDebut = $form['dateDebut']->getData();
            $dateFin = $form['dateFin']->getData();




            $em=$this->getDoctrine()->getRepository('BackBundle:Offres')->find($id);



            $modeles->setId($id);
            $modeles->setCategorie($categorie);
            $modeles->setCible($cible);
            $modeles->setTaux($taux);
            $modeles->setDateDebut2($dateDebut);
            $modeles->setDateFin2($dateFin);

            $em=$this->getDoctrine()->getManager();
            $em->flush();
            $this->addFlash('message', 'Offre modifiée avec succès');
            return $this->redirectToRoute('afficherOffre');
        }
        return $this->render('@Back/Offre/modifierOffre.html.twig', [

            'form' => $form->createView()
        ]);
    }


    public function afficherOffreAction()
    {
        $em=$this->getDoctrine()->getManager();
        $offres=$em->getRepository('BackBundle:Offres')->findAll();
        return $this->render('@Back/Offre/listeOffres.html.twig',array('m'=>$offres));

    }




    public function ajouterOffreAction(Request $request)
    {

        $modele=new Offres();
        if($request->isMethod('POST')){
            //$modele->setId($request->get('id'));
            $modele->setId($this->generateRandomString());
            $modele->setCategorie($request->get('categorie'));
            $modele->setCible($request->get('cible'));
            $modele->setTaux($request->get('taux'));
            $modele->setDateDebut($request->get('dateDebut'));
            $modele->setDateFin($request->get('dateFin'));

            $em=$this->getDoctrine()->getManager();
            $em->persist($modele);
            $em->flush();
            return $this->redirectToRoute('afficherOffre');
        }
        return $this->render('@Back/Offre/ajouterOffre.html.twig');




    }


    public function appliquerOffreAction(){

        $this->appliquerOffreProduit();

        return $this->redirectToRoute('afficherOffre');
    }


    public function appliquerOffreProduit()
    { //$accessor = PropertyAccess::getPropertyAccessor();
        $offresActives= $this->getDoctrine()->getRepository('BackBundle:Offres')->recupOffresDQL();
        var_dump($offresActives);

        foreach($offresActives as $of)
        {

                $cible = $of['cible'];
                $taux = $of['taux'];

            $ancienPrix= $this->getDoctrine()->getRepository('BackBundle:Produits')->getPrixInitialProduitDQL($cible);

            $prixCast = (int)$ancienPrix;

            $a =(intval($ancienPrix))*$taux;

            $nouveauPrix = (intval($ancienPrix))- ($a/100);


            $this->getDoctrine()->getRepository('BackBundle:Produits')->setPrixAfficheProduitDQL($nouveauPrix,$cible);

        }





    }


    public function envoiMailAction($id)
    {
        $Offre = $this->getDoctrine()->getRepository('BackBundle:Offres')->find($id);

        $categorie=$Offre->getCategorie();
        $cible=$Offre->getCible();
        $taux=$Offre->getTaux();
        $dateDebut=$Offre->getDateDebut();
        $dateFin=$Offre->getDateFin();


        $membres= $this->getDoctrine()->getRepository('BackBundle:Membre')->findAll();


        $html = $this->renderView(
            '@Back/Offre/mail.html.twig',array(
                'categorie'=>$categorie,
                'taux'=>$taux,
                'cible'=>$cible,
                'dateDebut'=>$dateDebut,
                'dateFin'=>$dateFin
            )
        );




        $filename = "Mail.pdf";
        $pdf = $this->get("knp_snappy.pdf")->getOutputFromHtml($html);





        $message = (new \Swift_Message('Recommendation'))
            ->setFrom('alaaeddine.ayari1@esprit.tn');
            //->setTo('knoxville1@live.fr')
//            ->setBody(
//
//                $this->renderView(
//                    '@Back/Offre/mail.html.twig',array(
//                        'categorie'=>$categorie,
//                        'taux'=>$taux,
//                        'cible'=>$cible,
//                        'dateDebut'=>$dateDebut,
//                        'dateFin'=>$dateFin
//                    )
//                ));
        foreach($membres as $m)
        {
            $message->addTo($m->getEmail());

        }

        $attachement = \Swift_Attachment::newInstance($pdf, $filename ,'application/pdf');
        $message->attach($attachement);
        $this->get('mailer')->send($message);

        return $this->redirectToRoute('afficherOffre');
    }

    public function  rechercherOffresAction(Request $request )
    {
        $em=$this->getDoctrine()->getManager();

        $motcle=$request->get('motcle');
        $modeles=$em->getRepository('FrontBundle:Produits')->findBy(array('nom'=>$motcle));



        return $this->render('@Front/Produit/listeProduit.html.twig',array('m'=>$modeles));

    }

}
