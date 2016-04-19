<?php

namespace FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use FrontEndBundle\Entity\Citta;
use FrontEndBundle\Entity\Utente;
use FrontEndBundle\Entity\Gusto;

/**
 * Gelateria
 *
 * @ORM\Table(name="gelateria")
 * @ORM\Entity(repositoryClass="FrontEndBundle\Repository\GelateriaRepository")
 */
class Gelateria
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
     * @ORM\Column(name="nome_gelateria", type="string", length=100)
     * @Assert\NotBlank()
     */
    private $nomeGelateria;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Citta")
     * @ORM\JoinColumn(name="id_citta", referencedColumnName="id")
     */
    private $idCitta;

    /**
     * @var string
     *
     * @ORM\Column(name="indirizzo", type="string", length=100)
     * @Assert\NotBlank()
     */
    private $indirizzo;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=20, nullable=true)
     */
    private $telefono;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_Lunedi", type="boolean")
     */
    private $isLunedi;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_Martedi", type="boolean")
     */
    private $isMartedi;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_Mercoledi", type="boolean")
     */
    private $isMercoledi;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_Giovedi", type="boolean")
     */
    private $isGiovedi;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_Venerdi", type="boolean")
     */
    private $isVenerdi;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_Sabato", type="boolean")
     */
    private $isSabato;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_Domenica", type="boolean")
     */
    private $isDomenica;

    /**
    * @ORM\ManyToMany(targetEntity="Utente", mappedBy="gelaterie")
    */
    private $utenti;

    /**
    * @ORM\ManyToMany(targetEntity="Gusto", inversedBy="gelaterie")
    * @ORM\JoinTable(name="gusti_gelaterie")
    */
    private $gusti;

    public function __construct()
    {
      $this->utenti= new \Doctrine\Common\Collections\ArrayCollection();
      $this->gusti= new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nomeGelateria
     *
     * @param string $nomeGelateria
     *
     * @return Gelateria
     */
    public function setNomeGelateria($nomeGelateria)
    {
        $this->nomeGelateria = $nomeGelateria;

        return $this;
    }

    /**
     * Get nomeGelateria
     *
     * @return string
     */
    public function getNomeGelateria()
    {
        return $this->nomeGelateria;
    }

    /**
     * Set idCitta
     *
     * @param integer $idCitta
     *
     * @return Gelateria
     */
    public function setIdCitta($idCitta)
    {
        $this->idCitta = $idCitta;

        return $this;
    }

    /**
     * Get idCitta
     *
     * @return int
     */
    public function getIdCitta()
    {
        return $this->idCitta;
    }

    /**
     * Set indirizzo
     *
     * @param string $indirizzo
     *
     * @return Gelateria
     */
    public function setIndirizzo($indirizzo)
    {
        $this->indirizzo = $indirizzo;

        return $this;
    }

    /**
     * Get indirizzo
     *
     * @return string
     */
    public function getIndirizzo()
    {
        return $this->indirizzo;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     *
     * @return Gelateria
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set isLunedi
     *
     * @param boolean $isLunedi
     *
     * @return Gelateria
     */
    public function setIsLunedi($isLunedi)
    {
        $this->isLunedi = $isLunedi;

        return $this;
    }

    /**
     * Get isLunedi
     *
     * @return bool
     */
    public function getIsLunedi()
    {
        return $this->isLunedi;
    }

    /**
     * Set isMartedi
     *
     * @param boolean $isMartedi
     *
     * @return Gelateria
     */
    public function setIsMartedi($isMartedi)
    {
        $this->isMartedi = $isMartedi;

        return $this;
    }

    /**
     * Get isMartedi
     *
     * @return bool
     */
    public function getIsMartedi()
    {
        return $this->isMartedi;
    }

    /**
     * Set isMercoledi
     *
     * @param boolean $isMercoledi
     *
     * @return Gelateria
     */
    public function setIsMercoledi($isMercoledi)
    {
        $this->isMercoledi = $isMercoledi;

        return $this;
    }

    /**
     * Get isMercoledi
     *
     * @return bool
     */
    public function getIsMercoledi()
    {
        return $this->isMercoledi;
    }

    /**
     * Set isGiovedi
     *
     * @param boolean $isGiovedi
     *
     * @return Gelateria
     */
    public function setIsGiovedi($isGiovedi)
    {
        $this->isGiovedi = $isGiovedi;

        return $this;
    }

    /**
     * Get isGiovedi
     *
     * @return bool
     */
    public function getIsGiovedi()
    {
        return $this->isGiovedi;
    }

    /**
     * Set isVenerdi
     *
     * @param boolean $isVenerdi
     *
     * @return Gelateria
     */
    public function setIsVenerdi($isVenerdi)
    {
        $this->isVenerdi = $isVenerdi;

        return $this;
    }

    /**
     * Get isVenerdi
     *
     * @return bool
     */
    public function getIsVenerdi()
    {
        return $this->isVenerdi;
    }

    /**
     * Set isSabato
     *
     * @param boolean $isSabato
     *
     * @return Gelateria
     */
    public function setIsSabato($isSabato)
    {
        $this->isSabato = $isSabato;

        return $this;
    }

    /**
     * Get isSabato
     *
     * @return bool
     */
    public function getIsSabato()
    {
        return $this->isSabato;
    }

    /**
     * Set isDomenica
     *
     * @param boolean $isDomenica
     *
     * @return Gelateria
     */
    public function setIsDomenica($isDomenica)
    {
        $this->isDomenica = $isDomenica;

        return $this;
    }

    /**
     * Get isDomenica
     *
     * @return bool
     */
    public function getIsDomenica()
    {
        return $this->isDomenica;
    }

    /**
     * Add utenti
     *
     * @param \FrontEndBundle\Entity\Utente $utenti
     *
     * @return Gelateria
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
     * Add gusti
     *
     * @param \FrontEndBundle\Entity\Gusto $gusti
     *
     * @return Gelateria
     */
    public function addGusti(\FrontEndBundle\Entity\Gusto $gusti)
    {
        $this->gusti[] = $gusti;

        return $this;
    }

    /**
     * Remove gusti
     *
     * @param \FrontEndBundle\Entity\Gusto $gusti
     */
    public function removeGusti(\FrontEndBundle\Entity\Gusto $gusti)
    {
        $this->gusti->removeElement($gusti);
    }

    /**
     * Get gusti
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGusti()
    {
        return $this->gusti;
    }
}
