<?php
/**
 * Created by PhpStorm.
 * User: farah
 * Date: 27/02/2019
 * Time: 10:21
 */

namespace FrontBundle\Repository;


class ProduitRepository extends \Doctrine\ORM\EntityRepository
{


    public function findProduit($nom)
    {  $query=$this->getEntityManager()->createQuery("select m from FrontBundle:Produits m where m.nom=nom ")->setParameter('nom',$nom);
        return $query->getResult();
    }

}
