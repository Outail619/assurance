<?php

namespace EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * reclamation_externe
 *
 * @ORM\Table(name="reclamation_externe")
 * @ORM\Entity(repositoryClass="EntityBundle\Repository\reclamation_externeRepository")
 */
class reclamation_externe
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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}

