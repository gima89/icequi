<?php

namespace FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
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
     * @ORM\Column(name="id_utente", type="integer")
     */
    private $idUtente;

    /**
     * @var string
     *
     * @ORM\Column(name="nome_gelateria_segnalata", type="string", length=50)
     */
    private $nomeGelateriaSegnalata;

    /**
     * @var string
     *
     * @ORM\Column(name="citta_segnalazione", type="string", length=25)
     */
    private $cittaSegnalazione;

    /**
     * @var string
     *
     * @ORM\Column(name="provincia_segnalazione", type="string", length=25)
     */
    private $provinciaSegnalazione;

    /**
     * @var string
     *
     * @ORM\Column(name="regione_segnalazione", type="string", length=25)
     */
    private $regioneSegnalazione;

    /**
     * @var string
     *
     * @ORM\Column(name="testo_segnalazione", type="text")
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
     * Set idUtente
     *
     * @param integer $idUtente
     *
     * @return Segnalazione
     */
    public function setIdUtente($idUtente)
    {
        $this->idUtente = $idUtente;

        return $this;
    }

    /**
     * Get idUtente
     *
     * @return int
     */
    public function getIdUtente()
    {
        return $this->idUtente;
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
     * Set provinciaSegnalazione
     *
     * @param string $provinciaSegnalazione
     *
     * @return Segnalazione
     */
    public function setProvinciaSegnalazione($provinciaSegnalazione)
    {
        $this->provinciaSegnalazione = $provinciaSegnalazione;

        return $this;
    }

    /**
     * Get provinciaSegnalazione
     *
     * @return string
     */
    public function getProvinciaSegnalazione()
    {
        return $this->provinciaSegnalazione;
    }

    /**
     * Set regioneSegnalazione
     *
     * @param string $regioneSegnalazione
     *
     * @return Segnalazione
     */
    public function setRegioneSegnalazione($regioneSegnalazione)
    {
        $this->regioneSegnalazione = $regioneSegnalazione;

        return $this;
    }

    /**
     * Get regioneSegnalazione
     *
     * @return string
     */
    public function getRegioneSegnalazione()
    {
        return $this->regioneSegnalazione;
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
