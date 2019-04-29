<?php
/**
 * Created by PhpStorm.
 * User: farah
 * Date: 27/02/2019
 * Time: 10:21
 */

namespace FrontBundle\Repository;


class VoucherRepository extends \Doctrine\ORM\EntityRepository
{


    public function VerifVoucherDQL($vouchercode){
        $query=$this->getEntityManager()->createQuery("select p.vouchercode from FrontBundle:Voucher p where p.vouchercode = ?1 AND p.nbuse < p.maxuse");
        $query->setParameter(1, $vouchercode);
        return $query->execute();


    }

}
