<?php

namespace BackBundle\Entity;

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

    /**
     * Astuces constructor.
     * @param int $idAstuce
     * @param string $titreAstuce
     * @param string $typeAstuce
     * @param string $descAstuce
     * @param string $imageAstuce
     */
    public function Astuces($idAstuce, $titreAstuce, $typeAstuce, $descAstuce, $imageAstuce)
    {
        $this->idAstuce = $idAstuce;
        $this->titreAstuce = $titreAstuce;
        $this->typeAstuce = $typeAstuce;
        $this->descAstuce = $descAstuce;
        $this->imageAstuce = $imageAstuce;
    }

    /**
     * @return int
     */
    public function getIdAstuce()
    {
        return $this->idAstuce;
    }

    /**
     * @param int $idAstuce
     */
    public function setIdAstuce($idAstuce)
    {
        $this->idAstuce = $idAstuce;
    }

    /**
     * @return string
     */
    public function getTitreAstuce()
    {
        return $this->titreAstuce;
    }

    /**
     * @param string $titreAstuce
     */
    public function setTitreAstuce($titreAstuce)
    {
        $this->titreAstuce = $titreAstuce;
    }

    /**
     * @return string
     */
    public function getTypeAstuce()
    {
        return $this->typeAstuce;
    }

    /**
     * @param string $typeAstuce
     */
    public function setTypeAstuce($typeAstuce)
    {
        $this->typeAstuce = $typeAstuce;
    }

    /**
     * @return string
     */
    public function getDescAstuce()
    {
        return $this->descAstuce;
    }

    /**
     * @param string $descAstuce
     */
    public function setDescAstuce($descAstuce)
    {
        $this->descAstuce = $descAstuce;
    }

    /**
     * @return string
     */
    public function getImageAstuce()
    {
        return $this->imageAstuce;
    }

    /**
     * @param string $imageAstuce
     */
    public function setImageAstuce($imageAstuce)
    {
        $this->imageAstuce = $imageAstuce;
    }




}

