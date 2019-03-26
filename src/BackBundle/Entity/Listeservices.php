<?php

namespace BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Listeservices
 *
 * @ORM\Table(name="listeservices")
 * @ORM\Entity
 */
class Listeservices
{
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nom;

    /**
     * @var float
     *
     * @ORM\Column(name="Prixparheure", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixparheure;

    /**
     * @var float
     *
     * @ORM\Column(name="PrixparheureAffiche", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixparheureaffiche;


}

