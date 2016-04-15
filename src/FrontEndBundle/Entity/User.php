<?php

namespace FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="FrontEndBundle\Repository\UserRepository")
 */
class User
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
     * @ORM\Column(name="id_citta_predefinita", type="integer", nullable=true)
     */
    private $idCittaPredefinita;


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
     * @return User
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
     * @return User
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
     * @return User
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
}

