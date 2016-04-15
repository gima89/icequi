<?php

namespace FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gusto
 *
 * @ORM\Table(name="gusto")
 * @ORM\Entity(repositoryClass="FrontEndBundle\Repository\GustoRepository")
 */
class Gusto
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
     * @ORM\Column(name="nome_gusto", type="string", length=20, unique=true)
     */
    private $nomeGusto;

    /**
     * @var string
     *
     * @ORM\Column(name="colore", type="string", length=7)
     */
    private $colore;

    /**
     * @var int
     *
     * @ORM\Column(name="id_tipo_gusto", type="integer")
     */
    private $idTipoGusto;


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
     * Set nomeGusto
     *
     * @param string $nomeGusto
     *
     * @return Gusto
     */
    public function setNomeGusto($nomeGusto)
    {
        $this->nomeGusto = $nomeGusto;

        return $this;
    }

    /**
     * Get nomeGusto
     *
     * @return string
     */
    public function getNomeGusto()
    {
        return $this->nomeGusto;
    }

    /**
     * Set colore
     *
     * @param string $colore
     *
     * @return Gusto
     */
    public function setColore($colore)
    {
        $this->colore = $colore;

        return $this;
    }

    /**
     * Get colore
     *
     * @return string
     */
    public function getColore()
    {
        return $this->colore;
    }

    /**
     * Set idTipoGusto
     *
     * @param integer $idTipoGusto
     *
     * @return Gusto
     */
    public function setIdTipoGusto($idTipoGusto)
    {
        $this->idTipoGusto = $idTipoGusto;

        return $this;
    }

    /**
     * Get idTipoGusto
     *
     * @return int
     */
    public function getIdTipoGusto()
    {
        return $this->idTipoGusto;
    }
}

