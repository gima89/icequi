<?php

namespace FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use FrontEndBundle\Entity\Utente;
use FrontEndBundle\Entity\Ricerca;
use FrontEndBundle\Entity\Gelateria;
use FrontEndBundle\Entity\Provincia;

/**
 * Citta
 *
 * @ORM\Table(name="citta")
 * @ORM\Entity(repositoryClass="FrontEndBundle\Repository\CittaRepository")
 */
class Citta
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
     * @ORM\Column(name="nome_citta", type="string", length=20, unique=true)
     */
    private $nomeCitta;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Provincia")
     * @ORM\JoinColumn(name="id_provincia", referencedColumnName="id")
     */
    private $idProvincia;

    /**
    * @ORM\OneToMany(targetEntity="Gelateria", mappedBy="id_citta")
    */
    private $gelaterie;

    public function __construct()
    {
      $this->gelaterie = new ArrayCollection();
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
     * Set nomeCitta
     *
     * @param string $nomeCitta
     *
     * @return Citta
     */
    public function setNomeCitta($nomeCitta)
    {
        $this->nomeCitta = $nomeCitta;

        return $this;
    }

    /**
     * Get nomeCitta
     *
     * @return string
     */
    public function getNomeCitta()
    {
        return $this->nomeCitta;
    }

    /**
     * Set idProvincia
     *
     * @param integer $idProvincia
     *
     * @return Citta
     */
    public function setIdProvincia($idProvincia)
    {
        $this->idProvincia = $idProvincia;

        return $this;
    }

    /**
     * Get idProvincia
     *
     * @return int
     */
    public function getIdProvincia()
    {
        return $this->idProvincia;
    }

    /**
     * Add gelaterie
     *
     * @param \FrontEndBundle\Entity\Gelateria $gelaterie
     *
     * @return Citta
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
