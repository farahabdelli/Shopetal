<?php

namespace FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Astuces
 *
 * @ORM\Table(name="astuces")
 * @ORM\Entity
 */
class Astuces
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Id_Astuce", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAstuce;

    /**
     * @var string
     *
     * @ORM\Column(name="Titre_Astuce", type="string", length=255, nullable=false)
     */
    private $titreAstuce;

    /**
     * @var string
     *
     * @ORM\Column(name="Type_Astuce", type="string", nullable=false)
     */
    private $typeAstuce;

    /**
     * @var string
     *
     * @ORM\Column(name="Desc_Astuce", type="string", length=255, nullable=false)
     */
    private $descAstuce;

    /**
     * @var string
     *
     * @ORM\Column(name="Image_Astuce", type="string", length=255, nullable=false)
     */
    private $imageAstuce;


}

