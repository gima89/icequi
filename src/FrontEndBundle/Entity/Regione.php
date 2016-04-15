<?php

namespace FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use FrontEndBundle\Entity\Provincia;

/**
 * Regione
 *
 * @ORM\Table(name="regione")
 * @ORM\Entity(repositoryClass="FrontEndBundle\Repository\RegioneRepository")
 */
class Regione
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
     * @ORM\Column(name="nome_regione", type="string", length=50, unique=true)
     * @Assert\NotBlank()
     */
    private $nomeRegione;

    /**
    * @ORM\OneToMany(targetEntity="Provincia", mappedBy="id_regione")
    */
    private $provincie;

    public function __construct()
    {
      $this->products = new ArrayCollection();
    }

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
     * Set nomeRegione
     *
     * @param string $nomeRegione
     *
     * @return Regione
     */
    public function setNomeRegione($nomeRegione)
    {
        $this->nomeRegione = $nomeRegione;

        return $this;
    }

    /**
     * Get nomeRegione
     *
     * @return string
     */
    public function getNomeRegione()
    {
        return $this->nomeRegione;
    }

    /**
     * Add provincie
     *
     * @param \FrontEndBundle\Entity\Provincia $provincie
     *
     * @return Regione
     */
    public function addProvincie(\FrontEndBundle\Entity\Provincia $provincie)
    {
        $this->provincie[] = $provincie;

        return $this;
    }

    /**
     * Remove provincie
     *
     * @param \FrontEndBundle\Entity\Provincia $provincie
     */
    public function removeProvincie(\FrontEndBundle\Entity\Provincia $provincie)
    {
        $this->provincie->removeElement($provincie);
    }

    /**
     * Get provincie
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProvincie()
    {
        return $this->provincie;
    }
}
