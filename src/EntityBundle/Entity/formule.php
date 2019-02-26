<?php

namespace EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * formule
 *
 * @ORM\Table(name="formule")
 * @ORM\Entity(repositoryClass="EntityBundle\Repository\formuleRepository")
 */
class formule
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
     * @ORM\Column(name="nom_formule", type="string", length=255)
     */
    private $nomFormule;

    /**
     * @var int
     *
     * @ORM\Column(name="forfait", type="integer")
     */
    private $forfait;

    /**
     * @var int
     *
     * @ORM\Column(name="total", type="integer")
     */
    private $total;

    /**
     * @var string
     *
     * @ORM\Column(name="information", type="string", length=255)
     */
    private $information;


    /**
     * @ORM\ManyToOne(targetEntity="EntityBundle\Entity\agence_assurance")
     *
     * @ORM\JoinColumn(name="id_agence", referencedColumnName="id")
     */
    private $agence;


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
     * Set nomFormule
     *
     * @param string $nomFormule
     *
     * @return formule
     */
    public function setNomFormule($nomFormule)
    {
        $this->nomFormule = $nomFormule;

        return $this;
    }

    /**
     * Get nomFormule
     *
     * @return string
     */
    public function getNomFormule()
    {
        return $this->nomFormule;
    }

    /**
     * Set forfait
     *
     * @param integer $forfait
     *
     * @return formule
     */
    public function setForfait($forfait)
    {
        $this->forfait = $forfait;

        return $this;
    }

    /**
     * Get forfait
     *
     * @return int
     */
    public function getForfait()
    {
        return $this->forfait;
    }

    /**
     * Set total
     *
     * @param integer $total
     *
     * @return formule
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return int
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set information
     *
     * @param string $information
     *
     * @return formule
     */
    public function setInformation($information)
    {
        $this->information = $information;

        return $this;
    }

    /**
     * Get information
     *
     * @return string
     */
    public function getInformation()
    {
        return $this->information;
    }


    /**
     * Set agence
     *
     * @param \EntityBundle\Entity\agence_assurance $agence
     *
     * @return formule
     */
    public function setAgence(\EntityBundle\Entity\agence_assurance $agence = null)
    {
        $this->agence = $agence;

        return $this;
    }

    /**
     * Get agence
     *
     * @return \EntityBundle\Entity\agence_assurance
     */
    public function getAgence()
    {
        return $this->agence;
    }
}
