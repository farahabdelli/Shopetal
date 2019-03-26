<?php

namespace FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Service
 *
 * @ORM\Table(name="service")
 * @ORM\Entity
 */
class Service
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_service", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idService;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_membre", type="integer", nullable=false)
     */
    private $idMembre;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_jardinier", type="integer", nullable=true)
     */
    private $idJardinier;

    /**
     * @var string
     *
     * @ORM\Column(name="service", type="string", length=50, nullable=false)
     */
    private $service;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbheures", type="integer", nullable=false)
     */
    private $nbheures;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbjours", type="integer", nullable=false)
     */
    private $nbjours;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;


}

