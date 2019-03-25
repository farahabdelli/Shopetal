<?php

namespace BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande")
 * @ORM\Entity
 */
class Commande
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_commande", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCommande;

    /**
     * @var string
     *
     * @ORM\Column(name="total", type="string", length=20, nullable=false)
     */
    private $total;

    /**
     * @var string
     *
     * @ORM\Column(name="id_user", type="string", length=30, nullable=false)
     */
    private $idUser;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=30, nullable=false)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=30, nullable=false)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="livreur", type="string", length=30, nullable=false)
     */
    private $livreur;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=30, nullable=false)
     */
    private $etat;


}

