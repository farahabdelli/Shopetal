<?php

namespace BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Offres
 *
 * @ORM\Table(name="offres")
 * @ORM\Entity
 */
class Offres
{
    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=8, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="categorie", type="string", length=30, nullable=true)
     */
    private $categorie;

    /**
     * @var string
     *
     * @ORM\Column(name="cible", type="string", length=30, nullable=true)
     */
    private $cible;

    /**
     * @var integer
     *
     * @ORM\Column(name="taux", type="integer", nullable=true)
     */
    private $taux;

    /**
     * @var string
     *
     * @ORM\Column(name="date_debut", type="string", length=30, nullable=true)
     */
    private $dateDebut;

    /**
     * @var string
     *
     * @ORM\Column(name="date_fin", type="string", length=30, nullable=true)
     */
    private $dateFin;

    /**
     * @var string
     *
     * @ORM\Column(name="date_ajout", type="string", length=30, nullable=true)
     */
    private $dateAjout;


}

