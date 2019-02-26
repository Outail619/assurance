<?php

namespace EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * reclamation_interne
 *
 * @ORM\Table(name="reclamation_interne")
 * @ORM\Entity(repositoryClass="EntityBundle\Repository\reclamation_interneRepository")
 */
class reclamation_interne
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
     * @ORM\Column(name="bug_type", type="string", length=255)
     */
    private $bugType;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;


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
     * Set bugType
     *
     * @param string $bugType
     *
     * @return reclamation_interne
     */
    public function setBugType($bugType)
    {
        $this->bugType = $bugType;

        return $this;
    }

    /**
     * Get bugType
     *
     * @return string
     */
    public function getBugType()
    {
        return $this->bugType;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return reclamation_interne
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}

