<?php
/**
 * Created by PhpStorm.
 * User: farah
 * Date: 27/02/2019
 * Time: 10:21
 */

namespace FrontBundle\Repository;


class CommandeRepository extends \Doctrine\ORM\EntityRepository
{


    public function afficherCommDQL($user){
        $query=$this->getEntityManager()->createQuery('SELECT t from FrontBundle:Commande t where t.idUser= ?1');
        $query->setParameter(1, $user->getUsername());
        $t= $query->getResult();
        return $t;

    }


}
