<?php

namespace FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use FrontEndBundle\Entity\Regione;
use FrontEndBundle\Entity\Citta;
/**
 * Provincia
 *
 * @ORM\Table(name="provincia")
 * @ORM\Entity(repositoryClass="FrontEndBundle\Repository\ProvinciaRepository")
 */
class Provincia
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
     * @ORM\Column(name="nome_provincia", type="string", length=50, unique=true)
     * @Assert\NotBlank()
     */
    private $nomeProvincia;

    /**
     * @var Provincia
     *
     * @ORM\ManyToOne(targetEntity="Regione", inversedBy="provincie")
     * @ORM\JoinColumn(name="id_regione", referencedColumnName="id")
     * @Assert\NotNull()
     */
    private $idRegione;

    /**
    * @ORM\OneToMany(targetEntity="Citta", mappedBy="id_provincia")
    */
    private $cities;

    public function __construct()
    {
      $this->cities= new ArrayCollection();
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
     * Set nomeProvincia
     *
     * @param string $nomeProvincia
     *
     * @return Provincia
     */
    public function setNomeProvincia($nomeProvincia)
    {
        $this->nomeProvincia = $nomeProvincia;

        return $this;
    }

    /**
     * Get nomeProvincia
     *
     * @return string
     */
    public function getNomeProvincia()
    {
        return $this->nomeProvincia;
    }

    /**
     * Set idRegione
     *
     * @param integer $idRegione
     *
     * @return Provincia
     */
    public function setIdRegione($idRegione)
    {
        $this->idRegione = $idRegione;

        return $this;
    }

    /**
     * Get idRegione
     *
     * @return int
     */
    public function getIdRegione()
    {
        return $this->idRegione;
    }

    /**
     * Add cittum
     *
     * @param \FrontEndBundle\Entity\Citta $cittum
     *
     * @return Provincia
     */
    public function addCittum(\FrontEndBundle\Entity\Citta $cittum)
    {
        $this->citta[] = $cittum;

        return $this;
    }

    /**
     * Remove cittum
     *
     * @param \FrontEndBundle\Entity\Citta $cittum
     */
    public function removeCittum(\FrontEndBundle\Entity\Citta $cittum)
    {
        $this->citta->removeElement($cittum);
    }

    /**
     * Get citta
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCitta()
    {
        return $this->citta;
    }

    /**
     * Add city
     *
     * @param \FrontEndBundle\Entity\Citta $city
     *
     * @return Provincia
     */
    public function addCity(\FrontEndBundle\Entity\Citta $city)
    {
        $this->cities[] = $city;

        return $this;
    }

    /**
     * Remove city
     *
     * @param \FrontEndBundle\Entity\Citta $city
     */
    public function removeCity(\FrontEndBundle\Entity\Citta $city)
    {
        $this->cities->removeElement($city);
    }

    /**
     * Get cities
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCities()
    {
        return $this->cities;
    }
}
