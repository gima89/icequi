<?php

namespace FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use FrontEndBundle\Entity\Segnalazione;
use FrontEndBundle\Entity\Citta;
use FrontEndBundle\Entity\Riecerca;
use FrontEndBundle\Entity\Gelateria;
/**
 * User
 *
 * @ORM\Table(name="utente")
 * @ORM\Entity(repositoryClass="FrontEndBundle\Repository\UtenteRepository")
 */
class Utente
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
     * @ORM\Column(name="mail_utente", type="string", length=30, unique=true)
     * @Assert\NotBlank()
     */
    private $mailUtente;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_admin", type="boolean")
     */
    private $isAdmin;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Citta", inversedBy="utenti")
     * @ORM\JoinColumn(name="id_citta_predefinita", referencedColumnName="id")
     */
    private $idCittaPredefinita;

    /**
    * @ORM\OneToMany(targetEntity="Segnalazione", mappedBy="id_utente")
    */
    private $segnalazioni;

    /**
    * @ORM\OneToMany(targetEntity="Ricerca", mappedBy="id_utente")
    */
    private $ricerche;

    /**
    * @ORM\ManyToMany(targetEntity="Gelateria", inversedBy="gelaterie")
    * @ORM\JoinTable(name="users_groups")
    */

    private $gelaterie;

    public function __construct()
    {
      $this->segnalazioni= new \Doctrine\Common\Collections\ArrayCollection();
      $this->ricerche = new \Doctrine\Common\Collections\ArrayCollection();
      $this->gelaterie = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set mailUtente
     *
     * @param string $mailUtente
     *
     * @return Utente
     */
    public function setMailUtente($mailUtente)
    {
        $this->mailUtente = $mailUtente;

        return $this;
    }

    /**
     * Get mailUtente
     *
     * @return string
     */
    public function getMailUtente()
    {
        return $this->mailUtente;
    }

    /**
     * Set isAdmin
     *
     * @param boolean $isAdmin
     *
     * @return Utente
     */
    public function setIsAdmin($isAdmin)
    {
        $this->isAdmin = $isAdmin;

        return $this;
    }

    /**
     * Get isAdmin
     *
     * @return bool
     */
    public function getIsAdmin()
    {
        return $this->isAdmin;
    }

    /**
     * Set idCittaPredefinita
     *
     * @param integer $idCittaPredefinita
     *
     * @return Utente
     */
    public function setIdCittaPredefinita($idCittaPredefinita)
    {
        $this->idCittaPredefinita = $idCittaPredefinita;

        return $this;
    }

    /**
     * Get idCittaPredefinita
     *
     * @return int
     */
    public function getIdCittaPredefinita()
    {
        return $this->idCittaPredefinita;
    }

    /**
     * Add utenti
     *
     * @param \FrontEndBundle\Entity\Segnalazione $utenti
     *
     * @return Utente
     */
    public function addUtenti(\FrontEndBundle\Entity\Segnalazione $utenti)
    {
        $this->utenti[] = $utenti;

        return $this;
    }

    /**
     * Remove utenti
     *
     * @param \FrontEndBundle\Entity\Segnalazione $utenti
     */
    public function removeUtenti(\FrontEndBundle\Entity\Segnalazione $utenti)
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
     * Add segnalazioni
     *
     * @param \FrontEndBundle\Entity\Segnalazione $segnalazioni
     *
     * @return Utente
     */
    public function addSegnalazioni(\FrontEndBundle\Entity\Segnalazione $segnalazioni)
    {
        $this->segnalazioni[] = $segnalazioni;

        return $this;
    }

    /**
     * Remove segnalazioni
     *
     * @param \FrontEndBundle\Entity\Segnalazione $segnalazioni
     */
    public function removeSegnalazioni(\FrontEndBundle\Entity\Segnalazione $segnalazioni)
    {
        $this->segnalazioni->removeElement($segnalazioni);
    }

    /**
     * Get segnalazioni
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSegnalazioni()
    {
        return $this->segnalazioni;
    }

    /**
     * Add ricerche
     *
     * @param \FrontEndBundle\Entity\Ricerca $ricerche
     *
     * @return Utente
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

    /**
     * Add gelaterie
     *
     * @param \FrontEndBundle\Entity\Gelateria $gelaterie
     *
     * @return Utente
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
