<?php

namespace FrontBundle\Entity;

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

    /**
     * Rating constructor.
     * @param int $idPer
     * @param int $idJar
     * @param int $stars
     */
    public function Rating($idPer, $idJar, $stars)
    {
        $this->idPer = $idPer;
        $this->idJar = $idJar;
        $this->stars = $stars;
    }

    /**
     * @return int
     */
    public function getIdPer()
    {
        return $this->idPer;
    }

    /**
     * @param int $idPer
     */
    public function setIdPer($idPer)
    {
        $this->idPer = $idPer;
    }

    /**
     * @return int
     */
    public function getIdJar()
    {
        return $this->idJar;
    }

    /**
     * @param int $idJar
     */
    public function setIdJar($idJar)
    {
        $this->idJar = $idJar;
    }

    /**
     * @return int
     */
    public function getStars()
    {
        return $this->stars;
    }

    /**
     * @param int $stars
     */
    public function setStars($stars)
    {
        $this->stars = $stars;
    }



}

