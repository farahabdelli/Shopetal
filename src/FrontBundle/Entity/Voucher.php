<?php

namespace FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Voucher
 *
 * @ORM\Table(name="voucher")
 * @ORM\Entity
 */
class Voucher
{
    /**
     * @var string
     *
     * @ORM\Column(name="voucherCode", type="string", length=6, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $vouchercode;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbUse", type="integer", nullable=true)
     */
    private $nbuse;

    /**
     * @var integer
     *
     * @ORM\Column(name="maxUse", type="integer", nullable=true)
     */
    private $maxuse;

    /**
     * @var integer
     *
     * @ORM\Column(name="rate", type="integer", nullable=true)
     */
    private $rate;


}

