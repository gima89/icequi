<?php

namespace FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gusti
 *
 * @ORM\Table(name="gusti")
 * @ORM\Entity(repositoryClass="FrontEndBundle\Repository\GustiRepository")
 */
class Gusti
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=7, nullable=true)
     */
    private $color;

    /**
     * @var int
     *
     * @ORM\Column(name="flavour_type", type="integer", nullable=true)
     */
    private $flavourType;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Gusti
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set color
     *
     * @param string $color
     *
     * @return Gusti
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set flavourType
     *
     * @param integer $flavourType
     *
     * @return Gusti
     */
    public function setFlavourType($flavourType)
    {
        $this->flavourType = $flavourType;

        return $this;
    }

    /**
     * Get flavourType
     *
     * @return int
     */
    public function getFlavourType()
    {
        return $this->flavourType;
    }
}

