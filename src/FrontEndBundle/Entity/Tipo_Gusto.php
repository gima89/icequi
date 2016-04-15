<?php

namespace FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tipo_Gusto
 *
 * @ORM\Table(name="tipo__gusto")
 * @ORM\Entity(repositoryClass="FrontEndBundle\Repository\Tipo_GustoRepository")
 */
class Tipo_Gusto
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
     * @ORM\Column(name="nome_tipo", type="string", length=10)
     */
    private $nomeTipo;


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
     * Set nomeTipo
     *
     * @param string $nomeTipo
     *
     * @return Tipo_Gusto
     */
    public function setNomeTipo($nomeTipo)
    {
        $this->nomeTipo = $nomeTipo;

        return $this;
    }

    /**
     * Get nomeTipo
     *
     * @return string
     */
    public function getNomeTipo()
    {
        return $this->nomeTipo;
    }
}

