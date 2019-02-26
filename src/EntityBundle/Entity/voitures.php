<?php

namespace EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * voitures
 *
 * @ORM\Table(name="voitures")
 * @ORM\Entity(repositoryClass="EntityBundle\Repository\voituresRepository")
 */
class voitures
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
     * @ORM\Column(name="marque", type="string", length=255, nullable=true)
     */
    private $marque;

    /**
     * @var string
     *
     * @ORM\Column(name="modele", type="string", length=255, nullable=true)
     */
    private $modele;

    /**
     * @var string
     *
     * @ORM\Column(name="modele_commercial", type="string", length=255, nullable=true)
     */
    private $modeleCommercial;

    /**
     * @var string
     *
     * @ORM\Column(name="carburant", type="string", length=255, nullable=true)
     */
    private $carburant;

    /**
     * @var string
     *
     * @ORM\Column(name="hybride", type="string", length=255, nullable=true)
     */
    private $hybride;

    /**
     * @var int
     *
     * @ORM\Column(name="puissance_fiscale", type="integer")
     */
    private $puissanceFiscale;

    /**
     * @var string
     *
     * @ORM\Column(name="vitesse", type="string", length=255, nullable=true)
     */
    private $vitesse;

    /**
     * @var int
     *
     * @ORM\Column(name="annee", type="integer")
     */
    private $annee;

    /**
     * @var string
     *
     * @ORM\Column(name="gamme", type="string", length=255)
     */
    private $gamme;


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
     * @return voitures
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
     * Set modele
     *
     * @param string $modele
     *
     * @return voitures
     */
    public function setModele($modele)
    {
        $this->modele = $modele;

        return $this;
    }

    /**
     * Get modele
     *
     * @return string
     */
    public function getModele()
    {
        return $this->modele;
    }

    /**
     * Set modeleCommercial
     *
     * @param string $modeleCommercial
     *
     * @return voitures
     */
    public function setModeleCommercial($modeleCommercial)
    {
        $this->modeleCommercial = $modeleCommercial;

        return $this;
    }

    /**
     * Get modeleCommercial
     *
     * @return string
     */
    public function getModeleCommercial()
    {
        return $this->modeleCommercial;
    }

    /**
     * Set carburant
     *
     * @param string $carburant
     *
     * @return voitures
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
     * Set hybride
     *
     * @param string $hybride
     *
     * @return voitures
     */
    public function setHybride($hybride)
    {
        $this->hybride = $hybride;

        return $this;
    }

    /**
     * Get hybride
     *
     * @return string
     */
    public function getHybride()
    {
        return $this->hybride;
    }

    /**
     * Set puissanceFiscale
     *
     * @param integer $puissanceFiscale
     *
     * @return voitures
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
     * Set vitesse
     *
     * @param string $vitesse
     *
     * @return voitures
     */
    public function setVitesse($vitesse)
    {
        $this->vitesse = $vitesse;

        return $this;
    }

    /**
     * Get vitesse
     *
     * @return string
     */
    public function getVitesse()
    {
        return $this->vitesse;
    }

    /**
     * Set annee
     *
     * @param integer $annee
     *
     * @return voitures
     */
    public function setAnnee($annee)
    {
        $this->annee = $annee;

        return $this;
    }

    /**
     * Get annee
     *
     * @return int
     */
    public function getAnnee()
    {
        return $this->annee;
    }

    /**
     * Set gamme
     *
     * @param string $gamme
     *
     * @return voitures
     */
    public function setGamme($gamme)
    {
        $this->gamme = $gamme;

        return $this;
    }

    /**
     * Get gamme
     *
     * @return string
     */
    public function getGamme()
    {
        return $this->gamme;
    }
}

