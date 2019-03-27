<?php

namespace FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Total
 *
 * @ORM\Table(name="total")
 * @ORM\Entity
 */
class Total
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_tot", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTot;

    /**
     * @var string
     *
     * @ORM\Column(name="total", type="string", length=30, nullable=false)
     */
    private $total;

    /**
     * Total constructor.
     * @param int $idTot
     * @param string $total
     */
    public function Total($idTot, $total)
    {
        $this->idTot = $idTot;
        $this->total = $total;
    }

    /**
     * @return int
     */
    public function getIdTot()
    {
        return $this->idTot;
    }

    /**
     * @param int $idTot
     */
    public function setIdTot($idTot)
    {
        $this->idTot = $idTot;
    }

    /**
     * @return string
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param string $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }



}

