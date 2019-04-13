<?php

namespace FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Favoris
 *
 * @ORM\Table(name="favoris")
 * @ORM\Entity(repositoryClass="FrontBundle\Repository\FavorisRepository")
 */
class Favoris
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_favoris", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idFavoris;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_produit", type="integer", nullable=false)
     */
    private $idProduit;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_produit", type="string", length=30, nullable=false)
     */
    private $nomProduit;

    /**
     * @var string
     *
     * @ORM\Column(name="image_produit", type="string", length=30, nullable=false)
     */
    private $imageProduit;

    /**
     * @var float
     *
     * @ORM\Column(name="prix_produit", type="float", precision=10, scale=0, nullable=false)
     */
    private $prixProduit;

    /**
     * Favoris constructor.
     * @param int $idFavoris
     * @param int $idProduit
     * @param string $nomProduit
     * @param string $imageProduit
     * @param float $prixProduit
     */
    public function Favoris($idFavoris, $idProduit, $nomProduit, $imageProduit, $prixProduit)
    {
        $this->idFavoris = $idFavoris;
        $this->idProduit = $idProduit;
        $this->nomProduit = $nomProduit;
        $this->imageProduit = $imageProduit;
        $this->prixProduit = $prixProduit;
    }

    /**
     * @return int
     */
    public function getIdFavoris()
    {
        return $this->idFavoris;
    }

    /**
     * @param int $idFavoris
     */
    public function setIdFavoris($idFavoris)
    {
        $this->idFavoris = $idFavoris;
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
     * @return string
     */
    public function getImageProduit()
    {
        return $this->imageProduit;
    }

    /**
     * @param string $imageProduit
     */
    public function setImageProduit($imageProduit)
    {
        $this->imageProduit = $imageProduit;
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



}

