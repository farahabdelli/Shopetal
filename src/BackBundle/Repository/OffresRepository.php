<?php
/**
 * Created by PhpStorm.
 * User: Ala
 * Date: 27/02/2019
 * Time: 10:21
 */

namespace BackBundle\Repository;


class OffresRepository extends \Doctrine\ORM\EntityRepository
{


    public function recupOffresDQL(){
        $query=$this->getEntityManager()->createQuery("SELECT t.id,t.cible,t.categorie,t.taux from BackBundle:Offres t where t.dateDebut BETWEEN CURRENT_DATE() AND CURRENT_DATE() ");
        $t= $query->getArrayResult();
        return $t;

    }
    public function getCategorieOffreDQL($id){
        $query=$this->getEntityManager()->createQuery("SELECT t.categorie as categoff from BackBundle:Offres t where t.id = ?1");
        $query->setParameter(1, $id);
        $t= $query->getResult();
        return $t;
    }

    public function getCibleOffreDQL($id){
        $query=$this->getEntityManager()->createQuery("SELECT t.cible as cibleoff from BackBundle:Offres t where t.id = ?1");
        $query->setParameter(1, $id);
        $t= $query->getResult();
        return $t;
    }

    public function getTauxOffreDQL($id){
        $query=$this->getEntityManager()->createQuery("SELECT t.taux as tauxoff from BackBundle:Offres t where t.id = ?1");
        $query->setParameter(1, $id);
        $t= $query->getResult();
        return $t;
    }

    public function MailDQL(){
        $query=$this->getEntityManager()->createQuery("SELECT m.email from BackBundle:Offres m ");
        $t= $query->getArrayResult();
        return $t;

    }








}
