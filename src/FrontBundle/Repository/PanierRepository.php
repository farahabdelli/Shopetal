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
        $t= $query->getSingleScalarResult();
        return $t;

    }
    public function totalDQL(){
        $query=$this->getEntityManager()->createQuery("SELECT SUM( t.prixPanier) As total from FrontBundle:Lignecommande t ");
        return $query->execute();


    }

    public function PanierDQL(){
        $query=$this->getEntityManager()->createQuery("select p.idLignecommande, p.nomProduit,p.prixProduit,SUM(p.quantiteLignecommande) as Quantite,SUM(p.prixPanier) as total from FrontBundle:Lignecommande p GROUP BY p.idProduit ");
        return $query->execute();


    }

}
