<?php

namespace FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Livreur
 *
 * @ORM\Table(name="livreur")
 * @ORM\Entity
 */
class Livreur
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_livreur", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idLivreur;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom_livreur", type="string", length=25, nullable=false)
     */
    private $nomLivreur;

    /**
     * @var string
     *
     * @ORM\Column(name="Mail_livreur", type="string", length=25, nullable=false)
     */
    private $mailLivreur;

    /**
     * @var integer
     *
     * @ORM\Column(name="Tel_livreur", type="integer", nullable=false)
     */
    private $telLivreur;

    /**
     * @var string
     *
     * @ORM\Column(name="Disponibilite", type="string", length=25, nullable=false)
     */
    private $disponibilite;


}

