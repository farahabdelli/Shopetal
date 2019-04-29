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

    public function getPrixInitialProduitDQL($cible){
        $query=$this->getEntityManager()->createQuery("SELECT p.prixInitial as prixIni from BackBundle:Produits p where p.categorie = :cible");
        $query->setParameter('cible', $cible);
        return $query->getResult();



    }

    public function setPrixAfficheProduitDQL($nouveauxPrix,$cible){

        $query=$this->getEntityManager()->createQuery("UPDATE BackBundle:Produits p SET p.prix = :nvprix WHERE p.categorie = :cible");
        $query->setParameter('nvprix', $nouveauxPrix);
        $query->setParameter('cible', $cible);
        $query->execute();

    }

    public function findOffre($categorie)
    {  $query=$this->getEntityManager()->createQuery("select m from BackBundle:Offres m where m.categorie = categorie")->setParameter('categorie',$categorie);
        return $query->getResult();
    }

}
