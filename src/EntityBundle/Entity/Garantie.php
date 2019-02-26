<?php

namespace EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Garantie
 *
 * @ORM\Table(name="garantie")
 * @ORM\Entity(repositoryClass="EntityBundle\Repository\GarantieRepository")
 */
class Garantie
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
     * @ORM\Column(name="nom_garantie", type="string", length=255)
     */
    private $nomGarantie;

    /**
     * @var int
     *
     * @ORM\Column(name="valeur", type="integer")
     */
    private $valeur;

    /**
     * @var int
     *
     * @ORM\Column(name="valeur_basique", type="integer")
     */
    private $valeurBasique;

    /**
     * @var int
     *
     * @ORM\Column(name="forfait", type="integer")
     */
    private $forfait;

    /**
     * @var string
     *
     * @ORM\Column(name="information", type="string", length=255)
     */
    private $information;

    /**
     * @ORM\ManyToOne(targetEntity="EntityBundle\Entity\formule")
     *
     * @ORM\JoinColumn(name="id_formule", referencedColumnName="id")
     */

    private $formule;

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
     * Set nomGarantie
     *
     * @param string $nomGarantie
     *
     * @return Garantie
     */
    public function setNomGarantie($nomGarantie)
    {
        $this->nomGarantie = $nomGarantie;

        return $this;
    }

    /**
     * Get nomGarantie
     *
     * @return string
     */
    public function getNomGarantie()
    {
        return $this->nomGarantie;
    }

    /**
     * Set valeur
     *
     * @param integer $valeur
     *
     * @return Garantie
     */
    public function setValeur($valeur)
    {
        $this->valeur = $valeur;

        return $this;
    }

    /**
     * Get valeur
     *
     * @return int
     */
    public function getValeur()
    {
        return $this->valeur;
    }

    /**
     * Set valeurBasique
     *
     * @param integer $valeurBasique
     *
     * @return Garantie
     */
    public function setValeurBasique($valeurBasique)
    {
        $this->valeurBasique = $valeurBasique;

        return $this;
    }

    /**
     * Get valeurBasique
     *
     * @return int
     */
    public function getValeurBasique()
    {
        return $this->valeurBasique;
    }

    /**
     * Set forfait
     *
     * @param integer $forfait
     *
     * @return Garantie
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
     * Set information
     *
     * @param string $information
     *
     * @return Garantie
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
     * Set formule
     *
     * @param \EntityBundle\Entity\formule $formule
     *
     * @return Garantie
     */
    public function setFormule(\EntityBundle\Entity\formule $formule = null)
    {
        $this->formule = $formule;

        return $this;
    }

    /**
     * Get formule
     *
     * @return \EntityBundle\Entity\formule
     */
    public function getFormule()
    {
        return $this->formule;
    }
}
