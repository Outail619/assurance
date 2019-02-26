<?php

namespace EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * contrat
 *
 * @ORM\Table(name="contrat")
 * @ORM\Entity(repositoryClass="EntityBundle\Repository\contratRepository")
 */
class contrat
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
     * @ORM\Column(name="reference_contrat", type="string", length=255)
     */
    private $referenceContrat;

    /**
     * @var string
     *
     * @ORM\Column(name="type_contrat", type="string", length=255)
     */
    private $typeContrat;

    /**
     * @var string
     *
     * @ORM\Column(name="date_signature", type="string")
     */
    private $dateSignature;

    /**
     * @var string
      *
     * @ORM\Column(name="date_fin", type="string")
     */
    private $dateFin;

    /**
     * @var string
     *
     * @ORM\Column(name="date_debut", type="string")
     */
    private $dateDebut;



    /**
     * @ORM\OneToOne(targetEntity="EntityBundle\Entity\vehicule")
     * @ORM\JoinColumn(name="vehicule", referencedColumnName="id", nullable=true)
     */
    private $vehicule;

    /**
     * @ORM\ManyToOne(targetEntity="EntityBundle\Entity\agence_assurance", inversedBy="contrat" )
     */
    private $assurances;

    /**
     * @var string
     *
     * @ORM\Column(name="client_id", type ="string", length=255)
     */
    private $client_id;

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
     * Set referenceContrat
     *
     * @param string $referenceContrat
     *
     * @return contrat
     */
    public function setReferenceContrat($referenceContrat)
    {
        $this->referenceContrat = $referenceContrat;

        return $this;
    }

    /**
     * Get referenceContrat
     *
     * @return string
     */
    public function getReferenceContrat()
    {
        return $this->referenceContrat;
    }

    /**
     * Set typeContrat
     *
     * @param string $typeContrat
     *
     * @return contrat
     */
    public function setTypeContrat($typeContrat)
    {
        $this->typeContrat = $typeContrat;

        return $this;
    }

    /**
     * Get typeContrat
     *
     * @return string
     */
    public function getTypeContrat()
    {
        return $this->typeContrat;
    }

    /**
     * Set dateSignature
     *
     * @param string $dateSignature
     *
     * @return contrat
     */
    public function setDateSignature($dateSignature)
    {
        $this->dateSignature = $dateSignature;

        return $this;
    }

    /**
     * Get dateSignature
     *
     * @return string
     */
    public function getDateSignature()
    {
        return $this->dateSignature;
    }

    /**
     * Set dateFin
     *
     * @param string $dateFin
     *
     * @return contrat
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return string
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set dateDebut
     *
     * @param string $dateDebut
     *
     * @return contrat
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return string
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set vehicule
     *
     * @param \EntityBundle\Entity\vehicule $vehicule
     *
     * @return contrat
     */
    public function setVehicule(\EntityBundle\Entity\vehicule $vehicule = null)
    {
        $this->vehicule = $vehicule;

        return $this;
    }

    /**
     * Get vehicule
     *
     * @return \EntityBundle\Entity\vehicule
     */
    public function getVehicule()
    {
        return $this->vehicule;
    }



    /**
     * Set assurances
     *
     * @param \EntityBundle\Entity\agence_assurance $assurances
     *
     * @return contrat
     */
    public function setAssurances(\EntityBundle\Entity\agence_assurance $assurances = null)
    {
        $this->assurances = $assurances;

        return $this;
    }

    /**
     * Get assurances
     *
     * @return \EntityBundle\Entity\agence_assurance
     */
    public function getAssurances()
    {
        return $this->assurances;
    }
    /**
     * Set client_id
     *
     * @param string $referenceContrat
     *
     * @return contrat
     */
    public function setID_client($referenceContrat)
    {
        $this->client_id = $referenceContrat;

        return $this;
    }

    /**
     * Get referenceContrat
     *
     * @return string
     */
    public function getID_client()
    {
        return $this->client_id;
    }
}
