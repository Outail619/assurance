<?php

namespace EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use EntityBundle\Entity\contrat;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * constat
 *
 * @ORM\Table(name="constat")
 * @ORM\Entity(repositoryClass="EntityBundle\Repository\constatRepository")
 */
class constat
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_constat", type="string",length=255)
     * @ORM\Id
     */
    private $id_constat;

    /**
     * @var int
     * @ORM\Column(name="ID_client", type="integer")
     */
    private $ID_client;

    /**
     * @var int
     * @ORM\Column(name="IDContratA", type="integer")
     */
    private $IDContratA;

    /**
     *
     * @var int
     * @ORM\Column(name="IDContratB", type="integer")
     */
    private $IDContratB;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_constat", type="date")
     */
    private $dateConstat;

    /**
     * @var string
     *
     * @ORM\Column(name="Lieu", type="string", length=255)
     */
    private $lieu;

    /**
     * @var string
     *
     * @ORM\Column(name="Degats_Humains", type="string", length=1)
     */
    private $degatsHumains;

    /**
     * @var string
     *
     * @ORM\Column(name="Degats_mat", type="string", length=1)
     */
    private $degatsMat;

    /**
     * @var string
     *
     * @ORM\Column(name="Observations", type="string", length=8000)
     */
    private $observations;

    /**
     * @var int
     *
     * @ORM\Column(name="Etat", type="integer")
     */
    private $etat;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="qrcode", type="string", length=255,nullable=true)
     */
    private $qrcode;

    /**
     * @var string
     *
     * @ORM\Column(name="circonstances", type="string", length=4000)
     */

    private $circonstances;
    /**
     * @var UploadedFile
     */
    public $file;


    /**
     * Get id_constat
     *
     * @return int
     */
    public function getId_constat()
    {
        return $this->id_constat;
    }

    /**
     * Set id_constat
     *
     * @param string $iDContratA
     *
     * @return constat
     */
    public function setId_constat($iDContratA)
    {
        $this->id_constat = $iDContratA;

        return $this;
    }

    /**
     * Set ID_client
     *
     * @param integer $iDContratA
     *
     * @return constat
     */
    public function setID_client($iDContratA)
    {
        $this->ID_client = $iDContratA;

        return $this;
    }

    /**
     * Get ID_client
     *
     * @return int
     */
    public function getID_client()
    {
        return $this->ID_client;
    }

    /**
     * Set IDContratA
     *
     * @param integer $iDContratA
     *
     * @return constat
     */
    public function setIDContratA($iDContratA)
    {
        $this->IDContratA = $iDContratA;

        return $this;
    }

    /**
     * Get IDContratA
     *
     * @return int
     */
    public function getIDContratA()
    {
        return $this->IDContratA;
    }

    /**
     * Set IDContratB
     *
     * @param integer $iDContratB
     *
     * @return constat
     */
    public function setIDContratB($iDContratB)
    {
        $this->IDContratB = $iDContratB;

        return $this;
    }

    /**
     * Get IDContratB
     *
     * @return int
     */
    public function getIDContratB()
    {
        return $this->IDContratB;
    }

    /**
     * Set dateConstat
     *
     * @param \DateTime $dateConstat
     *
     * @return constat
     */
    public function setDateConstat($dateConstat)
    {
        $this->dateConstat = $dateConstat;

        return $this;
    }

    /**
     * Get dateConstat
     *
     * @return \DateTime
     */
    public function getDateConstat()
    {
        return $this->dateConstat;
    }

    /**
     * Set lieu
     *
     * @param string $lieu
     *
     * @return constat
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * Get lieu
     *
     * @return string
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * Set degatsHumains
     *
     * @param string $degatsHumains
     *
     * @return constat
     */
    public function setDegatsHumains($degatsHumains)
    {
        $this->degatsHumains = $degatsHumains;

        return $this;
    }

    /**
     * Get degatsHumains
     *
     * @return string
     */
    public function getDegatsHumains()
    {
        return $this->degatsHumains;
    }

    /**
     * Set degatsMat
     *
     * @param string $degatsMat
     *
     * @return constat
     */
    public function setDegatsMat($degatsMat)
    {
        $this->degatsMat = $degatsMat;

        return $this;
    }

    /**
     * Get degatsMat
     *
     * @return string
     */
    public function getDegatsMat()
    {
        return $this->degatsMat;
    }

    /**
     * Set observations
     *
     * @param string $observations
     *
     * @return constat
     */
    public function setObservations($observations)
    {
        $this->observations = $observations;

        return $this;
    }

    /**
     * Get observations
     *
     * @return string
     */
    public function getObservations()
    {
        return $this->observations;
    }

    /**
     * Set etat
     *
     * @param integer $etat
     *
     * @return constat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return int
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set qrcode
     *
     * @param string $qrcode
     *
     * @return constat
     */
    public function setQrcode($lieu)
    {
        $this->qrcode = $lieu;

        return $this;
    }

    /**
     * Get qrcode
     *
     * @return qrcode
     */
    public function getQrcode()
    {
        return $this->qrcode;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return constat
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    public function getWebPath()
    {
        return null===$this->image ? null : $this->getUploadDir.'/'.$this->image;
    }
    protected function getUploadRootDir()
    {
        return __DIR__.'/../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
     return 'images';
    }

    public function uploadConstat()
    {
        $this->file->move($this->getUploadRootDir(),$this->image);
        $this->image=$this->file->getClientOriginalName();
        $this->file=null;
    }

    /**
     * Set circonstances
     *
     * @param string $circonstances
     *
     * @return constat
     */
    public function setCirconstances($circonstances)
    {
        $this->circonstances = $circonstances;

        return $this;
    }

    /**
     * Get circonstances
     *
     * @return string
     */
    public function getCirconstances()
    {
        return $this->circonstances;
    }

}

