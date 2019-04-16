<?php
/**
 * Created by PhpStorm.
 * User: farah
 * Date: 27/02/2019
 * Time: 10:21
 */

namespace FrontBundle\Repository;


class FavorisRepository extends \Doctrine\ORM\EntityRepository
{


    public function findfavorisDQL($idProduit)
    {  $query=$this->getEntityManager()->createQuery("select m from FrontBundle:Favoris m where m.idProduit= ?1 ")->setParameter(1,$idProduit);
        return $query->getResult();
    }

}
