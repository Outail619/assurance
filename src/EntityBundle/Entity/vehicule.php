<?php

namespace EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * vehicule
 *
 * @ORM\Table(name="vehicule")
 * @ORM\Entity(repositoryClass="EntityBundle\Repository\vehiculeRepository")
 */
class vehicule
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
     * @ORM\Column(name="marque", type="string", length=255)
     */
    private $marque;

    /**
     * @var string
     *
     * @ORM\Column(name="matricule", type="string", length=255)
     */
    private $matricule;

    /**
     * @var int
     *
     * @ORM\Column(name="puissance_fiscale", type="integer")
     */
    private $puissanceFiscale;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_circulation", type="date")
     */
    private $dateCirculation;

    /**
     * @var int
     *
     * @ORM\Column(name="nb_place", type="integer")
     */
    private $nbPlace;

    /**
     * @var string
     *
     * @ORM\Column(name="carburant", type="string", length=255)
     */
    private $carburant;

    /**
     * @var string
     *
     * @ORM\Column(name="type_usage", type="string", length=255)
     */
    private $typeUsage;

    /**
     * @var int
     *
     * @ORM\Column(name="valeur_declare", type="integer")
     */
    private $valeurDeclare;

    /**
     * @var int
     *
     * @ORM\Column(name="valeur_neuve", type="integer")
     */
    private $valeurNeuve;



    /**
     * @ORM\OneToOne(targetEntity="EntityBundle\Entity\contrat")
     * @ORM\JoinColumn(name="contrat", referencedColumnName="id", nullable=true)
     */
    private $contrat;

    /**
     * @var int
     *
     * @ORM\Column(name="valeur_marche", type="integer")
     */
    private $valeurMarche;

    /**
     * @ORM\ManyToOne(targetEntity="AssuranceBundle\Entity\User", inversedBy="vehicules" )
     */
    private $owner;

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
     * Set marque
     *
     * @param string $marque
     *
     * @return vehicule
     */
    public function setMarque($marque)
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * Get marque
     *
     * @return string
     */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * Set matricule
     *
     * @param string $matricule
     *
     * @return vehicule
     */
    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;

        return $this;
    }

    /**
     * Get matricule
     *
     * @return string
     */
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * Set puissanceFiscale
     *
     * @param integer $puissanceFiscale
     *
     * @return vehicule
     */
    public function setPuissanceFiscale($puissanceFiscale)
    {
        $this->puissanceFiscale = $puissanceFiscale;

        return $this;
    }

    /**
     * Get puissanceFiscale
     *
     * @return int
     */
    public function getPuissanceFiscale()
    {
        return $this->puissanceFiscale;
    }

    /**
     * Set dateCirculation
     *
     * @param \DateTime $dateCirculation
     *
     * @return vehicule
     */
    public function setDateCirculation($dateCirculation)
    {
        $this->dateCirculation = $dateCirculation;

        return $this;
    }

    /**
     * Get dateCirculation
     *
     * @return \DateTime
     */
    public function getDateCirculation()
    {
        return $this->dateCirculation;
    }

    /**
     * Set nbPlace
     *
     * @param integer $nbPlace
     *
     * @return vehicule
     */
    public function setNbPlace($nbPlace)
    {
        $this->nbPlace = $nbPlace;

        return $this;
    }

    /**
     * Get nbPlace
     *
     * @return int
     */
    public function getNbPlace()
    {
        return $this->nbPlace;
    }

    /**
     * Set carburant
     *
     * @param string $carburant
     *
     * @return vehicule
     */
    public function setCarburant($carburant)
    {
        $this->carburant = $carburant;

        return $this;
    }

    /**
     * Get carburant
     *
     * @return string
     */
    public function getCarburant()
    {
        return $this->carburant;
    }

    /**
     * Set typeUsage
     *
     * @param string $typeUsage
     *
     * @return vehicule
     */
    public function setTypeUsage($typeUsage)
    {
        $this->typeUsage = $typeUsage;

        return $this;
    }

    /**
     * Get typeUsage
     *
     * @return string
     */
    public function getTypeUsage()
    {
        return $this->typeUsage;
    }

    /**
     * Set valeurDeclare
     *
     * @param integer $valeurDeclare
     *
     * @return vehicule
     */
    public function setValeurDeclare($valeurDeclare)
    {
        $this->valeurDeclare = $valeurDeclare;

        return $this;
    }

    /**
     * Get valeurDeclare
     *
     * @return int
     */
    public function getValeurDeclare()
    {
        return $this->valeurDeclare;
    }

    /**
     * Set valeurNeuve
     *
     * @param integer $valeurNeuve
     *
     * @return vehicule
     */
    public function setValeurNeuve($valeurNeuve)
    {
        $this->valeurNeuve = $valeurNeuve;

        return $this;
    }

    /**
     * Get valeurNeuve
     *
     * @return int
     */
    public function getValeurNeuve()
    {
        return $this->valeurNeuve;
    }

    /**
     * Set valeurMarche
     *
     * @param integer $valeurMarche
     *
     * @return vehicule
     */
    public function setValeurMarche($valeurMarche)
    {
        $this->valeurMarche = $valeurMarche;

        return $this;
    }

    /**
     * Get valeurMarche
     *
     * @return int
     */
    public function getValeurMarche()
    {
        return $this->valeurMarche;
    }


    /**
     * Set owner
     *
     * @param \AssuranceBundle\Entity\User $owner
     *
     * @return vehicule
     */
    public function setOwner(\AssuranceBundle\Entity\User $owner = null)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return \AssuranceBundle\Entity\User
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Set contrat
     *
     * @param \EntityBundle\Entity\contrat $contrat
     *
     * @return vehicule
     */
    public function setContrat(\EntityBundle\Entity\contrat $contrat = null)
    {
        $this->contrat = $contrat;

        return $this;
    }

    /**
     * Get contrat
     *
     * @return \EntityBundle\Entity\contrat
     */
    public function getContrat()
    {
        return $this->contrat;
    }
}
