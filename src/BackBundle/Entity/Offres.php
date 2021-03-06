<?php

namespace BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Offre
 *
 * @ORM\Table(name="offres")
 * @ORM\Entity(repositoryClass="BackBundle\Repository\OffresRepository")
 */
class Offres
{
    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=8, nullable=false)
     * @ORM\Id
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
     * @var \DateTime
     *
     * @ORM\Column(name="date_debut", type="datetime", length=30, nullable=true)
     * @Assert\Date()
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin", type="datetime", length=30, nullable=true)
     * @Assert\DateTime()
     */
    private $dateFin;

    /**
     * @var string
     *
     * @ORM\Column(name="date_ajout", type="string", length=30, nullable=true)
     */
    private $dateAjout;

    /**
     * Offre constructor.
     * @param string $id
     * @param string $categorie
     * @param string $cible
     * @param int $taux
     * @param \DateTime $dateDebut
     * @param \DateTime $dateFin
     * @param string $dateAjout
     */
    public function Offres($id, $categorie, $cible, $taux, $dateDebut, $dateFin, $dateAjout)
    {
        $this->id = $id;
        $this->categorie = $categorie;
        $this->cible = $cible;
        $this->taux = $taux;
        $this->dateDebut = $dateDebut;
        $this->dateFin = $dateFin;
        $this->dateAjout = $dateAjout;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param string $categorie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }

    /**
     * @return string
     */
    public function getCible()
    {
        return $this->cible;
    }

    /**
     * @param string $cible
     */
    public function setCible($cible)
    {
        $this->cible = $cible;
    }

    /**
     * @return int
     */
    public function getTaux()
    {
        return $this->taux;
    }

    /**
     * @param int $taux
     */
    public function setTaux($taux)
    {
        $this->taux = $taux;
    }

    /**
     * @return \DateTime
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * @param \DateTime $dateDebut
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut =(new \DateTime($dateDebut));
    }

    /**
     * @param \DateTime $dateDebut
     */
    public function setDateDebut2($dateDebut)
    {
        $this->dateDebut =$dateDebut;
    }

    /**
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * @param \DateTime $dateFin
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = (new \DateTime($dateFin));
    }

    /**
     * @param \DateTime $dateFin
     */
    public function setDateFin2($dateFin)
    {
        $this->dateFin = $dateFin;
    }

    /**
     * @return string
     */
    public function getDateAjout()
    {
        return $this->dateAjout;
    }


    /**
     * @param string $dateAjout
     */
    public function setDateAjout($dateAjout)
    {
        $this->dateAjout = $dateAjout;
    }





}

