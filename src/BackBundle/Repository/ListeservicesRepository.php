<?php
/**
 * Created by PhpStorm.
 * User: Ala
 * Date: 27/02/2019
 * Time: 10:21
 */

namespace BackBundle\Repository;


class ListeservicesRepository extends \Doctrine\ORM\EntityRepository
{



    public function getPrixInitialServiceDQL($cible){
        $query=$this->getEntityManager()->createQuery("SELECT s.nom as nomservice from BackBundle:Listeservices t where s.nom = ?1");
        $query->setParameter(1, $cible);
        $s= $query->getResult();
        return $s;
    }

//SELECT prix_initial FROM produits WHERE categorie = '"+cibleOffre+"


}
