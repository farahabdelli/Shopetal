<?php

namespace BackBundle\Entity;

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

    /**
     * Livreur constructor.
     * @param int $idLivreur
     * @param string $nomLivreur
     * @param string $mailLivreur
     * @param int $telLivreur
     * @param string $disponibilite
     */
    public function Livreur($idLivreur, $nomLivreur, $mailLivreur, $telLivreur, $disponibilite)
    {
        $this->idLivreur = $idLivreur;
        $this->nomLivreur = $nomLivreur;
        $this->mailLivreur = $mailLivreur;
        $this->telLivreur = $telLivreur;
        $this->disponibilite = $disponibilite;
    }

    /**
     * @return int
     */
    public function getIdLivreur()
    {
        return $this->idLivreur;
    }

    /**
     * @param int $idLivreur
     */
    public function setIdLivreur($idLivreur)
    {
        $this->idLivreur = $idLivreur;
    }

    /**
     * @return string
     */
    public function getNomLivreur()
    {
        return $this->nomLivreur;
    }

    /**
     * @param string $nomLivreur
     */
    public function setNomLivreur($nomLivreur)
    {
        $this->nomLivreur = $nomLivreur;
    }

    /**
     * @return string
     */
    public function getMailLivreur()
    {
        return $this->mailLivreur;
    }

    /**
     * @param string $mailLivreur
     */
    public function setMailLivreur($mailLivreur)
    {
        $this->mailLivreur = $mailLivreur;
    }

    /**
     * @return int
     */
    public function getTelLivreur()
    {
        return $this->telLivreur;
    }

    /**
     * @param int $telLivreur
     */
    public function setTelLivreur($telLivreur)
    {
        $this->telLivreur = $telLivreur;
    }

    /**
     * @return string
     */
    public function getDisponibilite()
    {
        return $this->disponibilite;
    }

    /**
     * @param string $disponibilite
     */
    public function setDisponibilite($disponibilite)
    {
        $this->disponibilite = $disponibilite;
    }





}

