<?php

namespace FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use FrontEndBundle\Entity\Tipo_Gusto;
use FrontEndBundle\Entity\Gelateria;

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
     * @Assert\NotBlank()
     */
    private $nomeGusto;

    /**
     * @var string
     *
     * @ORM\Column(name="colore", type="string", length=7)
     *
     */
    private $colore;

    /**
     * @var string
     *
     * @ORM\Column(name="tipoGusto", type="string")
     * @Assert\NotNull()
     */
    private $tipoGusto;

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
     * Set tipoGusto
     *
     * @param string $tipoGusto
     *
     * @return Gusto
     */
    public function setTipoGusto($tipoGusto)
    {
        $this->tipoGusto = $tipoGusto;

        return $this;
    }

    /**
     * Get tipoGusto
     *
     * @return string
     */
    public function getTipoGusto()
    {
        return $this->tipoGusto;
    }

}
