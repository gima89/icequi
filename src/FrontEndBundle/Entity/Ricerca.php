<?php

namespace FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ricerca
 *
 * @ORM\Table(name="ricerca")
 * @ORM\Entity(repositoryClass="FrontEndBundle\Repository\RicercaRepository")
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
     */
    private $dataRicerca;

    /**
     * @var int
     *
     * @ORM\Column(name="id_utente", type="integer")
     */
    private $idUtente;

    /**
     * @var int
     *
     * @ORM\Column(name="id_citta", type="integer")
     */
    private $idCitta;

    /**
     * @var int
     *
     * @ORM\Column(name="id_gusto_1", type="integer")
     */
    private $idGusto1;

    /**
     * @var int
     *
     * @ORM\Column(name="id_gustoDue", type="integer")
     */
    private $idGustoDue;

    /**
     * @var int
     *
     * @ORM\Column(name="id_gustoTre", type="integer")
     */
    private $idGustoTre;


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
     * @param \DateTime $dataRicerca
     *
     * @return Ricerca
     */
    public function setDataRicerca($dataRicerca)
    {
        $this->dataRicerca = $dataRicerca;

        return $this;
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
     * Set idGusto1
     *
     * @param integer $idGusto1
     *
     * @return Ricerca
     */
    public function setIdGusto1($idGusto1)
    {
        $this->idGusto1 = $idGusto1;

        return $this;
    }

    /**
     * Get idGusto1
     *
     * @return int
     */
    public function getIdGusto1()
    {
        return $this->idGusto1;
    }

    /**
     * Set idGustoDue
     *
     * @param integer $idGustoDue
     *
     * @return Ricerca
     */
    public function setIdGustoDue($idGustoDue)
    {
        $this->idGustoDue = $idGustoDue;

        return $this;
    }

    /**
     * Get idGustoDue
     *
     * @return int
     */
    public function getIdGustoDue()
    {
        return $this->idGustoDue;
    }

    /**
     * Set idGustoTre
     *
     * @param integer $idGustoTre
     *
     * @return Ricerca
     */
    public function setIdGustoTre($idGustoTre)
    {
        $this->idGustoTre = $idGustoTre;

        return $this;
    }

    /**
     * Get idGustoTre
     *
     * @return int
     */
    public function getIdGustoTre()
    {
        return $this->idGustoTre;
    }
}
