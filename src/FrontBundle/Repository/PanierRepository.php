<?php
/**
 * Created by PhpStorm.
 * User: farah
 * Date: 27/02/2019
 * Time: 10:21
 */

namespace FrontBundle\Repository;


class PanierRepository extends \Doctrine\ORM\EntityRepository
{


    public function SommetotalDQL(){
        $query=$this->getEntityManager()->createQuery("SELECT SUM( t.prixPanier) As total from FrontBundle:Lignecommande t ");
        return $query->execute();

    }

}
