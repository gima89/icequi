<?php

namespace FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use FrontEndBundle\Entity\Tipo_Gusto;
use FrontEndBundle\Entity\Gelateria;

/**
 * Gusto
 *
 * @ORM\Table(name="gusto")
 * @ORM\Entity(repositoryClass="FrontEndBundle\Repository\GustoRepository")
 */
class Gusto
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
     * @ORM\Column(name="nome_gusto", type="string", length=20, unique=true)
     * @Assert\NotBlank()
     */
    private $nomeGusto;

    /**
     * @var string
     *
     * @ORM\Column(name="colore", type="string", length=7)
     * @Assert\Regex("^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$")
     */
    private $colore;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Tipo_Gusto", inversedBy="gusti")
     * @ORM\JoinColumn(name="id_tipo_gusto", referencedColumnName="id")
     * @Assert\NotNull()
     */
    private $idTipoGusto;

    /**
    * @ORM\ManyToMany(targetEntity="Gelateria", inversedBy="gusti")
    * @ORM\JoinTable(name="gusti_gelaterie")
    */
    private $gelaterie;

    public function __construct()
    {
      $this->gelaterie= new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nomeGusto
     *
     * @param string $nomeGusto
     *
     * @return Gusto
     */
    public function setNomeGusto($nomeGusto)
    {
        $this->nomeGusto = $nomeGusto;

        return $this;
    }

    /**
     * Get nomeGusto
     *
     * @return string
     */
    public function getNomeGusto()
    {
        return $this->nomeGusto;
    }

    /**
     * Set colore
     *
     * @param string $colore
     *
     * @return Gusto
     */
    public function setColore($colore)
    {
        $this->colore = $colore;

        return $this;
    }

    /**
     * Get colore
     *
     * @return string
     */
    public function getColore()
    {
        return $this->colore;
    }

    /**
     * Set idTipoGusto
     *
     * @param integer $idTipoGusto
     *
     * @return Gusto
     */
    public function setIdTipoGusto($idTipoGusto)
    {
        $this->idTipoGusto = $idTipoGusto;

        return $this;
    }

    /**
     * Get idTipoGusto
     *
     * @return int
     */
    public function getIdTipoGusto()
    {
        return $this->idTipoGusto;
    }

    /**
     * Add gelaterie
     *
     * @param \FrontEndBundle\Entity\Gelateria $gelaterie
     *
     * @return Gusto
     */
    public function addGelaterie(\FrontEndBundle\Entity\Gelateria $gelaterie)
    {
        $this->gelaterie[] = $gelaterie;

        return $this;
    }

    /**
     * Remove gelaterie
     *
     * @param \FrontEndBundle\Entity\Gelateria $gelaterie
     */
    public function removeGelaterie(\FrontEndBundle\Entity\Gelateria $gelaterie)
    {
        $this->gelaterie->removeElement($gelaterie);
    }

    /**
     * Get gelaterie
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGelaterie()
    {
        return $this->gelaterie;
    }
}
