<?php

namespace FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Citta
 *
 * @ORM\Table(name="citta")
 * @ORM\Entity(repositoryClass="FrontEndBundle\Repository\CittaRepository")
 */
class Citta
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
     * @ORM\Column(name="nome_citta", type="string", length=50, unique=true)
     */
    private $nomeCitta;

    /**
     * @var int
     *
     * @ORM\Column(name="id_provincia", type="integer")
     */
    private $idProvincia;


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
     * Set nomeCitta
     *
     * @param string $nomeCitta
     *
     * @return Citta
     */
    public function setNomeCitta($nomeCitta)
    {
        $this->nomeCitta = $nomeCitta;

        return $this;
    }

    /**
     * Get nomeCitta
     *
     * @return string
     */
    public function getNomeCitta()
    {
        return $this->nomeCitta;
    }

    /**
     * Set idProvincia
     *
     * @param integer $idProvincia
     *
     * @return Citta
     */
    public function setIdProvincia($idProvincia)
    {
        $this->idProvincia = $idProvincia;

        return $this;
    }

    /**
     * Get idProvincia
     *
     * @return int
     */
    public function getIdProvincia()
    {
        return $this->idProvincia;
    }
}

