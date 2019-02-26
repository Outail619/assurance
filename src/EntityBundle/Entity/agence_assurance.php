<?php

namespace EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * agence_assurance
 *
 * @ORM\Table(name="agence_assurance")
 * @ORM\Entity(repositoryClass="EntityBundle\Repository\agence_assuranceRepository")
 */
class agence_assurance
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
     * @ORM\Column(name="nom_agence", type="string", length=255)
     */
    private $nomAgence;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_agence", type="string", length=255)
     */
    private $adresseAgence;

    /**
     * @var int
     *
     * @ORM\Column(name="coord_x", type="integer")
     */
    private $coordX;

    /**
     * @var int
     *
     * @ORM\Column(name="coord_y", type="integer")
     */
    private $coordY;

    /**
     * @var string
     *
     * @ORM\Column(name="type_agence", type="string", length=255)
     */
    private $typeAgence;

    /**
     * @var int
     *
     * @ORM\Column(name="tel_agence", type="integer", unique=true)
     */
    private $telAgence;

    /**
     * @var string
     *
     * @ORM\Column(name="description_agence", type="string", length=255)
     */
    private $descriptionAgence;

    /**
     * @var int
     *
     * @ORM\Column(name="numero_fix", type="integer", unique=true)
     */
    private $numeroFix;

    /**
     * @var int
     *
     * @ORM\Column(name="numero_fax", type="integer")
     */
    private $numeroFax;

    /**
     * @var string
     *
     * @ORM\Column(name="image_agence", type="string", length=255)
     */
    private $imageAgence;

    /**
     * @var string
     *
     * @ORM\Column(name="logo_agence", type="string", length=255)
     */
    private $logoAgence;

    /**
     * @ORM\OneToMany(targetEntity="EntityBundle\Entity\contrat", mappedBy="assurances" , orphanRemoval=true)
     */
    private $contrat;

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
     * Set nomAgence
     *
     * @param string $nomAgence
     *
     * @return agence_assurance
     */
    public function setNomAgence($nomAgence)
    {
        $this->nomAgence = $nomAgence;

        return $this;
    }

    /**
     * Get nomAgence
     *
     * @return string
     */
    public function getNomAgence()
    {
        return $this->nomAgence;
    }

    /**
     * Set adresseAgence
     *
     * @param string $adresseAgence
     *
     * @return agence_assurance
     */
    public function setAdresseAgence($adresseAgence)
    {
        $this->adresseAgence = $adresseAgence;

        return $this;
    }

    /**
     * Get adresseAgence
     *
     * @return string
     */
    public function getAdresseAgence()
    {
        return $this->adresseAgence;
    }

    /**
     * Set coordX
     *
     * @param integer $coordX
     *
     * @return agence_assurance
     */
    public function setCoordX($coordX)
    {
        $this->coordX = $coordX;

        return $this;
    }

    /**
     * Get coordX
     *
     * @return int
     */
    public function getCoordX()
    {
        return $this->coordX;
    }

    /**
     * Set coordY
     *
     * @param integer $coordY
     *
     * @return agence_assurance
     */
    public function setCoordY($coordY)
    {
        $this->coordY = $coordY;

        return $this;
    }

    /**
     * Get coordY
     *
     * @return int
     */
    public function getCoordY()
    {
        return $this->coordY;
    }

    /**
     * Set typeAgence
     *
     * @param string $typeAgence
     *
     * @return agence_assurance
     */
    public function setTypeAgence($typeAgence)
    {
        $this->typeAgence = $typeAgence;

        return $this;
    }

    /**
     * Get typeAgence
     *
     * @return string
     */
    public function getTypeAgence()
    {
        return $this->typeAgence;
    }

    /**
     * Set telAgence
     *
     * @param integer $telAgence
     *
     * @return agence_assurance
     */
    public function setTelAgence($telAgence)
    {
        $this->telAgence = $telAgence;

        return $this;
    }

    /**
     * Get telAgence
     *
     * @return int
     */
    public function getTelAgence()
    {
        return $this->telAgence;
    }

    /**
     * Set descriptionAgence
     *
     * @param string $descriptionAgence
     *
     * @return agence_assurance
     */
    public function setDescriptionAgence($descriptionAgence)
    {
        $this->descriptionAgence = $descriptionAgence;

        return $this;
    }

    /**
     * Get descriptionAgence
     *
     * @return string
     */
    public function getDescriptionAgence()
    {
        return $this->descriptionAgence;
    }

    /**
     * Set numeroFix
     *
     * @param integer $numeroFix
     *
     * @return agence_assurance
     */
    public function setNumeroFix($numeroFix)
    {
        $this->numeroFix = $numeroFix;

        return $this;
    }

    /**
     * Get numeroFix
     *
     * @return int
     */
    public function getNumeroFix()
    {
        return $this->numeroFix;
    }

    /**
     * Set numeroFax
     *
     * @param integer $numeroFax
     *
     * @return agence_assurance
     */
    public function setNumeroFax($numeroFax)
    {
        $this->numeroFax = $numeroFax;

        return $this;
    }

    /**
     * Get numeroFax
     *
     * @return int
     */
    public function getNumeroFax()
    {
        return $this->numeroFax;
    }

    /**
     * Set imageAgence
     *
     * @param string $imageAgence
     *
     * @return agence_assurance
     */
    public function setImageAgence($imageAgence)
    {
        $this->imageAgence = $imageAgence;

        return $this;
    }

    /**
     * Get imageAgence
     *
     * @return string
     */
    public function getImageAgence()
    {
        return $this->imageAgence;
    }

    /**
     * Set logoAgence
     *
     * @param string $logoAgence
     *
     * @return agence_assurance
     */
    public function setLogoAgence($logoAgence)
    {
        $this->logoAgence = $logoAgence;

        return $this;
    }

    /**
     * Get logoAgence
     *
     * @return string
     */
    public function getLogoAgence()
    {
        return $this->logoAgence;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Add contrat
     *
     * @param \EntityBundle\Entity\contrat $contrat
     *
     * @return agence_assurance
     */
    public function addContrat(\EntityBundle\Entity\contrat $contrat)
    {
        $this->contrat[] = $contrat;
        $contrat->setAssurances($this);


        return $this;
    }

    /**
     * Remove contrat
     *
     * @param \EntityBundle\Entity\contrat $contrat
     */
    public function removeContrat(\EntityBundle\Entity\contrat $contrat)
    {
        if ($this->contrat->contains($contrat)) {
            $this->contrat->removeElement($contrat);
            // set the owning side to null (unless already changed)
            if ($contrat->setAssurances() === $this) {
                $contrat->setAssurances(null);
            }
        }
    }

    /**
     * Get contrat
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContrat()
    {
        return $this->contrat;
    }
}
