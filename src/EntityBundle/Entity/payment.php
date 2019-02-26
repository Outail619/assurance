<?php

namespace EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * payment
 *
 * @ORM\Table(name="payment")
 * @ORM\Entity(repositoryClass="EntityBundle\Repository\paymentRepository")
 */
class payment
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
     * @var int|null
     *
     * @ORM\Column(name="customer", type="integer", nullable=true)
     */
    private $customer;

    /**
     * @var int|null
     *
     * @ORM\Column(name="assurance", type="integer", nullable=true)
     */
    private $assurance;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var int|null
     *
     * @ORM\Column(name="amount", type="integer", nullable=true)
     */
    private $amount;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set customer.
     *
     * @param int|null $customer
     *
     * @return payment
     */
    public function setCustomer($customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer.
     *
     * @return int|null
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set assurance.
     *
     * @param int|null $assurance
     *
     * @return payment
     */
    public function setAssurance($assurance = null)
    {
        $this->assurance = $assurance;

        return $this;
    }

    /**
     * Get assurance.
     *
     * @return int|null
     */
    public function getAssurance()
    {
        return $this->assurance;
    }

    /**
     * Set date.
     *
     * @param \DateTime $date
     *
     * @return payment
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date.
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set amount.
     *
     * @param int|null $amount
     *
     * @return payment
     */
    public function setAmount($amount = null)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount.
     *
     * @return int|null
     */
    public function getAmount()
    {
        return $this->amount;
    }
}
