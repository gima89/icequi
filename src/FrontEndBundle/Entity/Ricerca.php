<?php

namespace FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use FrontEndBundle\Entity\Citta;
use FrontEndBundle\Entity\Utente;
use FrontEndBundle\Entity\Gusto;
/**
 * Ricerca
 *
 * @ORM\Table(name="ricerca")
 * @ORM\Entity(repositoryClass="FrontEndBundle\Repository\RicercaRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Ricerca
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
     * @var \DateTime
     *
     * @ORM\Column(name="data_ricerca", type="date")
     * @Assert\Date()
     */
    private $dataRicerca;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Utente", inversedBy="ricerche")
     * @ORM\JoinColumn(name="id_utente", referencedColumnName="id")
     */
    private $idUtente;

    /**
     * @ORM\ManyToOne(targetEntity="Citta")
     * @ORM\JoinColumn(name="id_citta", referencedColumnName="id")
     */
    private $idCitta;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Gusto")
     * @ORM\JoinColumn(name="id_gusto", referencedColumnName="id")
     * @Assert\NotNull()
     */
    private $idGusto;
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
     * Set dataRicerca
     *
     * @ORM\PrePersist
     *
     * @return Ricerca
     */
    public function setDataRicercaValue()
    {
        $this->dataRicerca = new \DateTime();
    }

    /**
     * Get dataRicerca
     *
     * @return \DateTime
     */
    public function getDataRicerca()
    {
        return $this->dataRicerca;
    }

    /**
     * Set idUtente
     *
     * @param integer $idUtente
     *
     * @return Ricerca
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
     * Set idCitta
     *
     * @param integer $idCitta
     *
     * @return Ricerca
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
     * Set idGusto
     *
     * @param integer $idGusto
     *
     * @return Ricerca
     */
    public function setIdGusto($idGusto)
    {
        $this->idGusto = $idGusto;

        return $this;
    }

    /**
     * Get idGusto
     *
     * @return int
     */
    public function getIdGusto()
    {
        return $this->idGusto;
    }

    /**
     * Set dataRicerca
     *
     * @param \DateTime $dataRicerca
     *
     * @return Ricerca
     */
    public function setDataRicerca($dataRicerca)
    {
        $this->dataRicerca = $dataRicerca;

        return $this;
    }
}
