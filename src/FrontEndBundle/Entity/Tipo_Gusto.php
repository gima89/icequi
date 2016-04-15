<?php

namespace FrontEndBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use FrontEndBundle\Entity\Gusto;
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
     * @Assert\NotBlank()
     */
    private $nomeTipo;

    /**
    * @ORM\OneToMany(targetEntity="Gusto", mappedBy="id_tipo_gusto")
    */
    private $gusti;

    public function __construct()
    {
      $this->gusti = new ArrayCollection();
    }


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

    /**
     * Add gusti
     *
     * @param \FrontEndBundle\Entity\Gusto $gusti
     *
     * @return Tipo_Gusto
     */
    public function addGusti(\FrontEndBundle\Entity\Gusto $gusti)
    {
        $this->gusti[] = $gusti;

        return $this;
    }

    /**
     * Remove gusti
     *
     * @param \FrontEndBundle\Entity\Gusto $gusti
     */
    public function removeGusti(\FrontEndBundle\Entity\Gusto $gusti)
    {
        $this->gusti->removeElement($gusti);
    }

    /**
     * Get gusti
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGusti()
    {
        return $this->gusti;
    }
}
