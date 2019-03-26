<?php

namespace BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rating
 *
 * @ORM\Table(name="rating")
 * @ORM\Entity
 */
class Rating
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_per", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPer;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_jar", type="integer", nullable=false)
     */
    private $idJar;

    /**
     * @var integer
     *
     * @ORM\Column(name="stars", type="integer", nullable=false)
     */
    private $stars;


}

