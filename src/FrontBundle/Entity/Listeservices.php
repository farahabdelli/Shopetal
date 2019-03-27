<?php

namespace FrontBundle\Entity;

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

    /**
     * Listeservices constructor.
     * @param string $nom
     * @param float $prixparheure
     * @param float $prixparheureaffiche
     */
    public function Listeservices($nom, $prixparheure, $prixparheureaffiche)
    {
        $this->nom = $nom;
        $this->prixparheure = $prixparheure;
        $this->prixparheureaffiche = $prixparheureaffiche;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return float
     */
    public function getPrixparheure()
    {
        return $this->prixparheure;
    }

    /**
     * @param float $prixparheure
     */
    public function setPrixparheure($prixparheure)
    {
        $this->prixparheure = $prixparheure;
    }

    /**
     * @return float
     */
    public function getPrixparheureaffiche()
    {
        return $this->prixparheureaffiche;
    }

    /**
     * @param float $prixparheureaffiche
     */
    public function setPrixparheureaffiche($prixparheureaffiche)
    {
        $this->prixparheureaffiche = $prixparheureaffiche;
    }



}

