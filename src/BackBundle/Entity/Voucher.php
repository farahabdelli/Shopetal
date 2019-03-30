<?php

namespace BackBundle\Entity;

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

    /**
     * Voucher constructor.
     * @param string $vouchercode
     * @param int $nbuse
     * @param int $maxuse
     * @param int $rate
     */
    public function Voucher($vouchercode, $nbuse, $maxuse, $rate)
    {
        $this->vouchercode = $vouchercode;
        $this->nbuse = $nbuse;
        $this->maxuse = $maxuse;
        $this->rate = $rate;
    }

    /**
     * @return string
     */
    public function getVouchercode()
    {
        return $this->vouchercode;
    }

    /**
     * @param string $vouchercode
     */
    public function setVouchercode($vouchercode)
    {
        $this->vouchercode = $vouchercode;
    }

    /**
     * @return int
     */
    public function getNbuse()
    {
        return $this->nbuse;
    }

    /**
     * @param int $nbuse
     */
    public function setNbuse($nbuse)
    {
        $this->nbuse = $nbuse;
    }

    /**
     * @return int
     */
    public function getMaxuse()
    {
        return $this->maxuse;
    }

    /**
     * @param int $maxuse
     */
    public function setMaxuse($maxuse)
    {
        $this->maxuse = $maxuse;
    }

    /**
     * @return int
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * @param int $rate
     */
    public function setRate($rate)
    {
        $this->rate = $rate;
    }




}

