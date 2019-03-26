<?php

namespace BackBundle\Entity;

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

    /**
     * Service constructor.
     * @param int $idService
     * @param int $idMembre
     * @param int $idJardinier
     * @param string $service
     * @param int $nbheures
     * @param int $nbjours
     * @param float $prix
     */
    public function Service($idService, $idMembre, $idJardinier, $service, $nbheures, $nbjours, $prix)
    {
        $this->idService = $idService;
        $this->idMembre = $idMembre;
        $this->idJardinier = $idJardinier;
        $this->service = $service;
        $this->nbheures = $nbheures;
        $this->nbjours = $nbjours;
        $this->prix = $prix;
    }

    /**
     * @return int
     */
    public function getIdService()
    {
        return $this->idService;
    }

    /**
     * @param int $idService
     */
    public function setIdService($idService)
    {
        $this->idService = $idService;
    }

    /**
     * @return int
     */
    public function getIdMembre()
    {
        return $this->idMembre;
    }

    /**
     * @param int $idMembre
     */
    public function setIdMembre($idMembre)
    {
        $this->idMembre = $idMembre;
    }

    /**
     * @return int
     */
    public function getIdJardinier()
    {
        return $this->idJardinier;
    }

    /**
     * @param int $idJardinier
     */
    public function setIdJardinier($idJardinier)
    {
        $this->idJardinier = $idJardinier;
    }

    /**
     * @return string
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param string $service
     */
    public function setService($service)
    {
        $this->service = $service;
    }

    /**
     * @return int
     */
    public function getNbheures()
    {
        return $this->nbheures;
    }

    /**
     * @param int $nbheures
     */
    public function setNbheures($nbheures)
    {
        $this->nbheures = $nbheures;
    }

    /**
     * @return int
     */
    public function getNbjours()
    {
        return $this->nbjours;
    }

    /**
     * @param int $nbjours
     */
    public function setNbjours($nbjours)
    {
        $this->nbjours = $nbjours;
    }

    /**
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param float $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }



}

