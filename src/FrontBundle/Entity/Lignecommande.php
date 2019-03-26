<?php

namespace FrontBundle\Entity;

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


}

