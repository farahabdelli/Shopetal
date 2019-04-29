<?php

namespace BackBundle\Controller;
use BackBundle\Entity\Offres;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Serializer ;


class OffreMobileController extends Controller
{

    public function MafficherOffreAction()
    {

        $em=$this->getDoctrine()->getManager()
        ->getRepository('BackBundle:Offres')->findAll();


        foreach ($em as $o){
            $o->setDateDebut2($o->getDateDebut()->format('Y-m-d'));
            $o->setDateFin2($o->getDateFin()->format('Y-m-d'));
        }
        $serializer = new Serializer  ([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($em);

        return new JsonResponse($formatted);

    }



    public function MajouterOffreAction(Request $request)
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

}
