<?php

namespace FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Provincia
 *
 * @ORM\Table(name="provincia")
 * @ORM\Entity(repositoryClass="FrontEndBundle\Repository\ProvinciaRepository")
 */
class Provincia
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
     * @ORM\Column(name="nome_provincia", type="string", length=50, unique=true)
     */
    private $nomeProvincia;

    /**
     * @var int
     *
     * @ORM\Column(name="id_regione", type="integer")
     */
    private $idRegione;


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
     * Set nomeProvincia
     *
     * @param string $nomeProvincia
     *
     * @return Provincia
     */
    public function setNomeProvincia($nomeProvincia)
    {
        $this->nomeProvincia = $nomeProvincia;

        return $this;
    }

    /**
     * Get nomeProvincia
     *
     * @return string
     */
    public function getNomeProvincia()
    {
        return $this->nomeProvincia;
    }

    /**
     * Set idRegione
     *
     * @param integer $idRegione
     *
     * @return Provincia
     */
    public function setIdRegione($idRegione)
    {
        $this->idRegione = $idRegione;

        return $this;
    }

    /**
     * Get idRegione
     *
     * @return int
     */
    public function getIdRegione()
    {
        return $this->idRegione;
    }
}
