<?php

namespace FrontEndBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
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
class Utente extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_admin", type="boolean")
     */
    private $isAdmin = false;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Citta")
     * @ORM\JoinColumn(name="id_citta_predefinita", referencedColumnName="id")
     */
    private $idCittaPredefinita;

    /**
    * @ORM\ManyToMany(targetEntity="Gelateria")
    * @ORM\JoinTable(name="preferite",
    *   joinColumns={@ORM\JoinColumn(name="id_utente", referencedColumnName="id")},
    *      inverseJoinColumns={@ORM\JoinColumn(name="id_gelateria", referencedColumnName="id")}
    *      )
    */
    private $gelaterie;

    public function __construct()
    {
      parent::__construct();
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
