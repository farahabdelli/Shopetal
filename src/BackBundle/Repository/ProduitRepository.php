<?php
/**
 * Created by PhpStorm.
 * User: farah
 * Date: 27/02/2019
 * Time: 10:21
 */

namespace BackBundle\Repository;
use BackBundle;

class ProduitRepository extends \Doctrine\ORM\EntityRepository
{


    public function findProduitMoins()
    {  $query=$this->getEntityManager()->createQuery("select m.nom,m.quantite from BackBundle:Produits m order by m.quantite desc ")->setMaxResults(1);

        return $query->getResult();



    }
    public function findProduitNonDispo()
    {  $query=$this->getEntityManager()->createQuery("select m.nom,m.quantite from BackBundle:Produits m where m.quantite=0 ");

        return $query->getResult();



    }

}
