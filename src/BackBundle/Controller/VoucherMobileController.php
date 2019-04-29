<?php

namespace BackBundle\Controller;
use BackBundle\Entity\Voucher;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Serializer ;


class VoucherMobileController extends Controller
{







    public function MafficherVoucherAction()
    {
        $em=$this->getDoctrine()->getManager()
            ->getRepository('BackBundle:Voucher')->findAll();
        $serializer = new Serializer  ([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($em);

        return new JsonResponse($formatted);
    }

    public function MajouterVoucherAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $Voucher = new Voucher();
        $Voucher->setVouchercode($request->get('voucherCode'));
        $Voucher->setMaxuse($request->get('maxUse'));
        $Voucher->setNbuse($request->get('nbUse'));
        $Voucher->setRate($request->get('rate'));
        $em->persist($Voucher);
        $em->flush();
        $serializer = new Serializer([new ObjectNormalizer()]);
        $formatted = $serializer->normalize($Voucher);
        return new JsonResponse($formatted);

    }




//    public function ajouterVoucherAction(Request $request)
//    {
//        $modele=new Voucher();
//        if($request->isMethod('POST')){
//           // $modele->setIdLivreur($request->get('idLivreur'));
//            $modele->setVouchercode($request->get('vouchercode'));
//            $modele->setNbuse($request->get('nbuse'));
//            $modele->setMaxuse($request->get('maxuse'));
//            $modele->setRate($request->get('rate'));
//
//            $em=$this->getDoctrine()->getManager();
//            $em->persist($modele);
//            $em->flush();
//            return $this->redirectToRoute('afficherVoucher');
//        }
//        return $this->render('@Back/Voucher/ajouterVoucher.html.twig');
//    }
}
