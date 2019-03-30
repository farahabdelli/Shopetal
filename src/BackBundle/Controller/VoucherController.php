<?php

namespace BackBundle\Controller;
use BackBundle\Entity\Voucher;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class VoucherController extends Controller
{


    public function supprimerVoucherAction($vouchercode)
    {
        $em = $this->getDoctrine()->getManager();
        $modele = $em->getRepository('BackBundle:Voucher')->find($vouchercode);
        $em->remove($modele);

        $em->flush();
        return $this->redirectToRoute('afficherVoucher');
    }

    public function modifierVoucherAction(Request $request,$vouchercode )
    {
        $modeles = $this->getDoctrine()->getRepository('BackBundle:Voucher')->find($vouchercode);
        $modeles->setVouchercode($modeles->getVouchercode());
        $modeles->setNbuse($modeles->getNbuse());
        $modeles->setMaxuse($modeles->getMaxuse());
        $modeles->setRate($modeles->getRate());
        $form=$this->createFormBuilder($modeles)
            ->add('vouchercode', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('nbuse', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('maxuse', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('rate', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('save', SubmitType::class, array('label' => 'Enregistrer Modification', 'attr' => array('class' => 'btn btn-primary', 'style' => 'margin-top:10px')))
            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $vouchercode = $form['vouchercode']->getData();
            $nbuse = $form['nbuse']->getData();
            $maxuse = $form['maxuse']->getData();
            $rate = $form['rate']->getData();




            $em=$this->getDoctrine()->getRepository('BackBundle:Voucher')->find($vouchercode);



            $modeles->setVouchercode($vouchercode);
            $modeles->setNbuse($nbuse);
            $modeles->setMaxuse($maxuse);
            $modeles->setRate($rate);

            $em=$this->getDoctrine()->getManager();
            $em->flush();
            $this->addFlash('message', 'Livreur modifié avec succès');
            return $this->redirectToRoute('afficherVoucher');
        }
        return $this->render('@Back/Voucher/modifierVoucher.html.twig', [

            'form' => $form->createView()
        ]);
    }


    public function afficherVoucherAction()
    {
        $em=$this->getDoctrine()->getManager();
        $modeles=$em->getRepository('BackBundle:Voucher')->findAll();

        return $this->render('@Back/Voucher/listeVouchers.html.twig',array('m'=>$modeles));
    }




    public function ajouterVoucherAction(Request $request)
    {
        $modele=new Voucher();
        if($request->isMethod('POST')){
           // $modele->setIdLivreur($request->get('idLivreur'));
            $modele->setVouchercode($request->get('vouchercode'));
            $modele->setNbuse($request->get('nbuse'));
            $modele->setMaxuse($request->get('maxuse'));
            $modele->setRate($request->get('rate'));

            $em=$this->getDoctrine()->getManager();
            $em->persist($modele);
            $em->flush();
            return $this->redirectToRoute('afficherVoucher');
        }
        return $this->render('@Back/Voucher/ajouterVoucher.html.twig');




    }
}
