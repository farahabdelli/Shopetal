<?php

namespace BackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lignecommande
 *
 * @ORM\Table(name="lignecommande")
 * @ORM\Entity
 */
class Lignecommande
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_lignecommande", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idLignecommande;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_produit", type="integer", nullable=false)
     */
    private $idProduit;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_produit", type="string", length=20, nullable=false)
     */
    private $nomProduit;

    /**
     * @var float
     *
     * @ORM\Column(name="prix_produit", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixProduit;

    /**
     * @var integer
     *
     * @ORM\Column(name="Quantite_lignecommande", type="integer", nullable=false)
     */
    private $quantiteLignecommande;

    /**
     * Lignecommande constructor.
     * @param int $idLignecommande
     * @param int $idProduit
     * @param string $nomProduit
     * @param float $prixProduit
     * @param int $quantiteLignecommande
     */
    public function Lignecommande($idLignecommande, $idProduit, $nomProduit, $prixProduit, $quantiteLignecommande)
    {
        $this->idLignecommande = $idLignecommande;
        $this->idProduit = $idProduit;
        $this->nomProduit = $nomProduit;
        $this->prixProduit = $prixProduit;
        $this->quantiteLignecommande = $quantiteLignecommande;
    }

    /**
     * @return int
     */
    public function getIdLignecommande()
    {
        return $this->idLignecommande;
    }

    /**
     * @param int $idLignecommande
     */
    public function setIdLignecommande($idLignecommande)
    {
        $this->idLignecommande = $idLignecommande;
    }

    /**
     * @return int
     */
    public function getIdProduit()
    {
        return $this->idProduit;
    }

    /**
     * @param int $idProduit
     */
    public function setIdProduit($idProduit)
    {
        $this->idProduit = $idProduit;
    }

    /**
     * @return string
     */
    public function getNomProduit()
    {
        return $this->nomProduit;
    }

    /**
     * @param string $nomProduit
     */
    public function setNomProduit($nomProduit)
    {
        $this->nomProduit = $nomProduit;
    }

    /**
     * @return float
     */
    public function getPrixProduit()
    {
        return $this->prixProduit;
    }

    /**
     * @param float $prixProduit
     */
    public function setPrixProduit($prixProduit)
    {
        $this->prixProduit = $prixProduit;
    }

    /**
     * @return int
     */
    public function getQuantiteLignecommande()
    {
        return $this->quantiteLignecommande;
    }

    /**
     * @param int $quantiteLignecommande
     */
    public function setQuantiteLignecommande($quantiteLignecommande)
    {
        $this->quantiteLignecommande = $quantiteLignecommande;
    }



}

