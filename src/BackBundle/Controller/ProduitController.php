<?php

namespace BackBundle\Controller;

use BackBundle\Entity\Produits;
use BackBundle\Entity\Catalogue;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Ob\HighchartsBundle\Highcharts\Highchart;
use Zend\Json\Expr;

class ProduitController extends Controller
{


    public function supprimerProduitAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $modele = $em->getRepository('BackBundle:Produits')->find($id);
        $em->remove($modele);

        $em->flush();
        return $this->redirectToRoute('afficher_Produit');
    }

    public function modifierProduitAction(Request $request,$id )
    {
        $modeles = $this->getDoctrine()->getRepository('BackBundle:Produits')->find($id);
        $modeles->setNom($modeles->getNom());
        $modeles->setPrix($modeles->getPrix());
        $modeles->setQuantite($modeles->getQuantite());
        $modeles->setCategorie($modeles->getCategorie());
        $modeles->setType($modeles->getType());
        $form=$this->createFormBuilder($modeles)
            ->add('nom', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('prix', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('quantite', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('categorie', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('type', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('save', SubmitType::class, array('label' => 'Enregistrer Modification', 'attr' => array('class' => 'btn btn-primary', 'style' => 'margin-top:10px')))
            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $nom = $form['nom']->getData();
            $prix = $form['prix']->getData();
            $quantite = $form['quantite']->getData();
            $categorie = $form['categorie']->getData();
            $type = $form['type']->getData();




            $em=$this->getDoctrine()->getRepository('BackBundle:Produits')->find($id);

            $modeles->setNom($nom);
            $modeles->setPrix($prix);
            $modeles->setQuantite($quantite);
            $modeles->setCategorie($categorie);
            $modeles->setType($type);
            $em=$this->getDoctrine()->getManager();
            $em->flush();
            $this->addFlash('message', 'Produit modifié avec succès');
            return $this->redirectToRoute('afficher_Produit');
        }
        return $this->render('@Back/Produit/modifierProduit.html.twig', [

            'form' => $form->createView()
        ]);
    }







    public function afficherProduitAction()
    {
        $em=$this->getDoctrine()->getManager();
        $modeles=$em->getRepository('BackBundle:Produits')->findAll();





        return $this->render('@Back/Produit/listeProduit.html.twig',array('m'=>$modeles));
    }
    public function ajouterProduitAction(Request $request)
    {
        $modele=new Produits();
        if($request->isMethod('POST')){

            $modele->setNom($request->get('nom'));
            $modele->setPrix($request->get('prix'));
            $modele->setPrixInitial($request->get('prix'));
            $modele->setQuantite($request->get('quantite'));
            $modele->setImage($request->get('image'));
            $modele->setCategorie($request->get('categorie'));
            $modele->setType($request->get('type'));
            $em=$this->getDoctrine()->getManager();
            $em->persist($modele);
            $em->flush();

        }
        return $this->render('@Back/Produit/ajouterProduit.html.twig');




    }


    public function afficherCatalogueAction()
    {
        $em=$this->getDoctrine()->getManager();
        $modeles=$em->getRepository('BackBundle:Catalogue')->findAll();
        return $this->render('@Back/Produit/listeCatalogue.html.twig',array('m'=>$modeles));
    }
    public function ajouterProduitCatalogueAction($id)
    {
        $modeles = $this->getDoctrine()->getRepository('BackBundle:Produits')->find($id);
        $modele=new Catalogue();
        $modele->setId($modeles->getId());
        $modele->setNom($modeles->getNom());
        $modele->setPrix($modeles->getPrix());
        $modele->setImage($modeles->getImage());
        $modele->setQuantite($modeles->getQuantite());
        $modele->setCategorie($modeles->getCategorie());
            $em=$this->getDoctrine()->getManager();
            $em->persist($modele);
            $em->flush();


        return $this->redirectToRoute('afficher_Produit');




    }


    public function supprimerProduitCatalogueAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $modele = $em->getRepository('BackBundle:Catalogue')->find($id);
        $em->remove($modele);

        $em->flush();
        return $this->redirectToRoute('afficher_Catalogue');
    }

    public function modifierProduitCatalogueAction(Request $request,$id )
    {
        $modeles = $this->getDoctrine()->getRepository('BackBundle:Catalogue')->find($id);

        $modeles->setPrix($modeles->getPrix());
        $modeles->setQuantite($modeles->getQuantite());
        $form=$this->createFormBuilder($modeles)

            ->add('prix', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('quantite', TextType::class, array('attr' => array('class' => 'form-control')))
            ->add('save', SubmitType::class, array('label' => 'Enregistrer Modification', 'attr' => array('class' => 'btn btn-primary', 'style' => 'margin-top:10px')))
            ->getForm();
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {


            $prix = $form['prix']->getData();
            $quantite = $form['quantite']->getData();





            $em=$this->getDoctrine()->getRepository('BackBundle:Produits')->find($id);


            $modeles->setPrix($prix);
            $modeles->setQuantite($quantite);
            $em=$this->getDoctrine()->getManager();
            $em->flush();
            $this->addFlash('message', 'modifié avec succès');
            return $this->redirectToRoute('afficher_Catalogue');
        }
        return $this->render('@Back/Produit/modifierProduit.html.twig', [

            'form' => $form->createView()
        ]);
    }

    public function PdfProduitAction()
    {

        $em=$this->getDoctrine()->getManager();
        $modeles=$em->getRepository('BackBundle:Produits')->findAll();

        $snappy = $this->get('knp_snappy.pdf');
        $html = $this->renderView('@Back/Produit/pdf.html.twig', array('title' => 'Hello World !',"model"=>$modeles));
        $filename = 'myFirstSnappyPDF';
        return new Response(
            $snappy->getOutputFromHtml($html),
            200,
            array(
                'Content-Type'          => 'application/pdf',
                'Content-Disposition'   => 'inline; filename="'.$filename.'.pdf"'
            )
        );

    }
    public function chartProduitAction()
    {
        $produits = $this->getDoctrine()->getManager()->getRepository('BackBundle:Produits')->findAll();
        $ArrayProduits = array();

        foreach ($produits as $p)
        {
            array_push($ArrayProduits,$p->getNom());
        }
        $ArrayContite = array();
        foreach ($produits as $p)
        {
            array_push($ArrayContite,$p->getQuantite());
        }

        $series = array(
            array(
                'name'  => 'Quantite',
                'type'  => 'column',
                'color' => '#4572A7',
                'yAxis' => 1,
                'data'  => $ArrayContite,
            ),
            array(
                'name'  => 'Temperature',
                'type'  => 'spline',
                'color' => '#AA4643',
                'data'  => $ArrayContite,
            ),
        );
        $yData = array(
            array(
                'labels' => array(
                    'formatter' => new Expr('function () { return this.value + " degrees C" }'),
                    'style'     => array('color' => '#AA4643')
                ),
                'title' => array(
                    'text'  => 'Temperature',
                    'style' => array('color' => '#AA4643')
                ),
                'opposite' => true,
            ),
            array(
                'labels' => array(
                    'formatter' => new Expr('function () { return this.value + "Quantite" }'),
                    'style'     => array('color' => '#4572A7')
                ),
                'gridLineWidth' => 0,
                'title' => array(
                    'text'  => 'Quaantite',
                    'style' => array('color' => '#4572A7')
                ),
            ),
        );
        $categories = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');


        $ob = new Highchart();
        $ob->chart->renderTo('linechart'); // The #id of the div where to render the chart
        $ob->chart->type('column');
        $ob->title->text('Average Monthly Weather Data for Tokyo');
        $ob->xAxis->categories($ArrayProduits);
        $ob->yAxis($yData);
        $ob->legend->enabled(false);
        $formatter = new Expr('function () {
                 var unit = {
                     "Quantite": "Quantite",
                     "Temperature": "degrees C"
                 }[this.series.name];
                 return this.x + ": <b>" + this.y + "</b> " + unit;
             }');
        $ob->tooltip->formatter($formatter);
        $ob->series($series);

        return $this->render('@Back/Produit/chartProduit.html.twig', array(
            'chart' => $ob
        ));
    }


}
