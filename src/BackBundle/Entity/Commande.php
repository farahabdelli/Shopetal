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
     * @ORM\ManyToOne(targetEntity="Livreur")
     *
     * @ORM\JoinColumn(name="livreur",referencedColumnName="id_livreur")
     */
    private $livreur;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=30, nullable=false)
     */
    private $etat;

    /**
     * Commande constructor.
     * @param int $idCommande
     * @param string $total
     * @param string $idUser
     * @param string $adresse
     * @param string $ville
     * @param string $livreur
     * @param string $etat
     */
    public function Commande($idCommande, $total, $idUser, $adresse, $ville, $livreur, $etat)
    {
        $this->idCommande = $idCommande;
        $this->total = $total;
        $this->idUser = $idUser;
        $this->adresse = $adresse;
        $this->ville = $ville;
        $this->livreur = $livreur;
        $this->etat = $etat;
    }

    /**
     * @return int
     */
    public function getIdCommande()
    {
        return $this->idCommande;
    }

    /**
     * @param int $idCommande
     */
    public function setIdCommande($idCommande)
    {
        $this->idCommande = $idCommande;
    }

    /**
     * @return string
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param string $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }

    /**
     * @return string
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param string $idUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    /**
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param string $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param string $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    /**
     * @return string
     */
    public function getLivreur()
    {
        return $this->livreur;
    }

    /**
     * @param string $livreur
     */
    public function setLivreur($livreur)
    {
        $this->livreur = $livreur;
    }

    /**
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param string $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }



}

