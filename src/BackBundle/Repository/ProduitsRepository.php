<?php
/**
 * Created by PhpStorm.
 * User: Ala
 * Date: 27/02/2019
 * Time: 10:21
 */

namespace BackBundle\Repository;


class ProduitsRepository extends \Doctrine\ORM\EntityRepository
{


    public function getPrixInitialProduitDQL($cible){
        $query=$this->getEntityManager()->createQuery("SELECT p.prixInitial as prixIni from BackBundle:Produits p where p.type = ?1");
        $query->setParameter(1, $cible);
        $p= $query->getResult();
        return $p;
    }

    public function updatePrixProduitsDQL(){

    }

//SELECT prix_initial FROM produits WHERE categorie = '"+cibleOffre+"


}
