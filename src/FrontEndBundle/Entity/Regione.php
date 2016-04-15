<?php

namespace FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Regione
 *
 * @ORM\Table(name="regione")
 * @ORM\Entity(repositoryClass="FrontEndBundle\Repository\RegioneRepository")
 */
class Regione
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
     * @ORM\Column(name="nome_regione", type="string", length=50, unique=true)
     */
    private $nomeRegione;


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
     * Set nomeRegione
     *
     * @param string $nomeRegione
     *
     * @return Regione
     */
    public function setNomeRegione($nomeRegione)
    {
        $this->nomeRegione = $nomeRegione;

        return $this;
    }

    /**
     * Get nomeRegione
     *
     * @return string
     */
    public function getNomeRegione()
    {
        return $this->nomeRegione;
    }
}

