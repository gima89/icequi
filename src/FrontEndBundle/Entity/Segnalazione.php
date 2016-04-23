<?php

namespace FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use FrontEndBundle\Entity\Utente;
/**
 * Segnalazione
 *
 * @ORM\Table(name="segnalazione")
 * @ORM\Entity(repositoryClass="FrontEndBundle\Repository\SegnalazioneRepository")
 */
class Segnalazione
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
     * @var int
     *
     * @ORM\Column(name="email", type="string", length=50)
     * @Assert\NotBlank()
     */
    private $mailUtente;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_gelateria_segnalata", type="string", length=50)
     * @Assert\NotBlank()
     */
    private $nomeGelateriaSegnalata;

    /**
     * @var string
     *
     * @ORM\Column(name="citta_segnalazione", type="string", length=25)
     * @Assert\NotBlank()
     */
    private $cittaSegnalazione;

    /**
     * @var string
     *
     * @ORM\Column(name="testo_segnalazione", type="text")
     * @Assert\NotBlank()
     */
    private $testoSegnalazione;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono_segnalazione", type="string", length=15, nullable=true)
     */
    private $telefonoSegnalazione;


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
     * @param integer $mailUtente
     *
     * @return Segnalazione
     */
    public function setMailUtente($mailUtente)
    {
        $this->mailUtente = $mailUtente;

        return $this;
    }

    /**
     * Get mailUtente
     *
     * @return int
     */
    public function getMailUtente()
    {
        return $this->mailUtente;
    }

    /**
     * Set nomeGelateriaSegnalata
     *
     * @param string $nomeGelateriaSegnalata
     *
     * @return Segnalazione
     */
    public function setNomeGelateriaSegnalata($nomeGelateriaSegnalata)
    {
        $this->nomeGelateriaSegnalata = $nomeGelateriaSegnalata;

        return $this;
    }

    /**
     * Get nomeGelateriaSegnalata
     *
     * @return string
     */
    public function getNomeGelateriaSegnalata()
    {
        return $this->nomeGelateriaSegnalata;
    }

    /**
     * Set cittaSegnalazione
     *
     * @param string $cittaSegnalazione
     *
     * @return Segnalazione
     */
    public function setCittaSegnalazione($cittaSegnalazione)
    {
        $this->cittaSegnalazione = $cittaSegnalazione;

        return $this;
    }

    /**
     * Get cittaSegnalazione
     *
     * @return string
     */
    public function getCittaSegnalazione()
    {
        return $this->cittaSegnalazione;
    }

    /**
     * Set testoSegnalazione
     *
     * @param string $testoSegnalazione
     *
     * @return Segnalazione
     */
    public function setTestoSegnalazione($testoSegnalazione)
    {
        $this->testoSegnalazione = $testoSegnalazione;

        return $this;
    }

    /**
     * Get testoSegnalazione
     *
     * @return string
     */
    public function getTestoSegnalazione()
    {
        return $this->testoSegnalazione;
    }

    /**
     * Set telefonoSegnalazione
     *
     * @param string $telefonoSegnalazione
     *
     * @return Segnalazione
     */
    public function setTelefonoSegnalazione($telefonoSegnalazione)
    {
        $this->telefonoSegnalazione = $telefonoSegnalazione;

        return $this;
    }

    /**
     * Get telefonoSegnalazione
     *
     * @return string
     */
    public function getTelefonoSegnalazione()
    {
        return $this->telefonoSegnalazione;
    }
}
