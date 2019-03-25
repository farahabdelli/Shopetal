<?php

namespace BackBundle\Entity;

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


}

