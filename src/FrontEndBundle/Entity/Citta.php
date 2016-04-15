<?php

namespace FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use FrontEndBundle\Entity\Utente;
use FrontEndBundle\Entity\Ricerca;

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
     * @ORM\ManyToOne(targetEntity="Provincia", inversedBy="cities")
     * @ORM\JoinColumn(name="id_provincia", referencedColumnName="id")
     */
    private $idProvincia;

    /**
    * @ORM\OneToMany(targetEntity="Utente", mappedBy="id_citta_predefinita")
    */
    private $utenti;

    /**
    * @ORM\OneToMany(targetEntity="Ricerca", mappedBy="id_citta")
    */
    private $ricerche;

    public function __construct()
    {
      $this->ricerche = new ArrayCollection();
      $this->utenti = new ArrayCollection();
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
     * Add utenti
     *
     * @param \FrontEndBundle\Entity\Utente $utenti
     *
     * @return Citta
     */
    public function addUtenti(\FrontEndBundle\Entity\Utente $utenti)
    {
        $this->utenti[] = $utenti;

        return $this;
    }

    /**
     * Remove utenti
     *
     * @param \FrontEndBundle\Entity\Utente $utenti
     */
    public function removeUtenti(\FrontEndBundle\Entity\Utente $utenti)
    {
        $this->utenti->removeElement($utenti);
    }

    /**
     * Get utenti
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUtenti()
    {
        return $this->utenti;
    }

    /**
     * Add ricerche
     *
     * @param \FrontEndBundle\Entity\Ricerca $ricerche
     *
     * @return Citta
     */
    public function addRicerche(\FrontEndBundle\Entity\Ricerca $ricerche)
    {
        $this->ricerche[] = $ricerche;

        return $this;
    }

    /**
     * Remove ricerche
     *
     * @param \FrontEndBundle\Entity\Ricerca $ricerche
     */
    public function removeRicerche(\FrontEndBundle\Entity\Ricerca $ricerche)
    {
        $this->ricerche->removeElement($ricerche);
    }

    /**
     * Get ricerche
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRicerche()
    {
        return $this->ricerche;
    }
}
