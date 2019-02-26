<?php

namespace EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * devis
 *
 * @ORM\Table(name="devis")
 * @ORM\Entity(repositoryClass="EntityBundle\Repository\devisRepository")
 */
class devis
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
     * @var int
     *
     * @ORM\Column(name="id_assurance", type="integer")
     */
    private $idAssurance;

    /**
     * @var int
     *
     * @ORM\Column(name="id_user", type="integer")
     */
    private $idUser;


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
     * Set idAssurance
     *
     * @param integer $idAssurance
     *
     * @return devis
     */
    public function setIdAssurance($idAssurance)
    {
        $this->idAssurance = $idAssurance;

        return $this;
    }

    /**
     * Get idAssurance
     *
     * @return int
     */
    public function getIdAssurance()
    {
        return $this->idAssurance;
    }

    /**
     * Set idUser
     *
     * @param integer $idUser
     *
     * @return devis
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return int
     */
    public function getIdUser()
    {
        return $this->idUser;
    }
}

