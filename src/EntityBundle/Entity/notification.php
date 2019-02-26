<?php

namespace EntityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * notification
 *
 * @ORM\Table(name="notification")
 * @ORM\Entity(repositoryClass="EntityBundle\Repository\notificationRepository")
 */
class notification
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
     * @ORM\Column(name="message", type="string", length=255, nullable=true)
     */
    private $message;

    /**
     * @var int
     *
     * @ORM\Column(name="sender", type="integer")
     */
    private $sender;

    /**
     * @var int
     *
     * @ORM\Column(name="receiver", type="integer")
     */
    private $receiver;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_notif", type="date")
     */
    private $dateNotif;

    /**
     * @var string
     *
     * @ORM\Column(name="lien", type="string", length=255, nullable=true)
     */
    private $lien;

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
     * Set message
     *
     * @param string $message
     *
     * @return notification
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set sender
     *
     * @param integer $sender
     *
     * @return notification
     */
    public function setSender($sender)
    {
        $this->sender = $sender;

        return $this;
    }

    /**
     * Get sender
     *
     * @return int
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * Set receiver
     *
     * @param integer $receiver
     *
     * @return notification
     */
    public function setReceiver($receiver)
    {
        $this->receiver = $receiver;

        return $this;
    }

    /**
     * Get receiver
     *
     * @return int
     */
    public function getReceiver()
    {
        return $this->receiver;
    }
    /**
     * Set dateNotif
     *
     * @param \DateTime $dateNotif
     *
     * @return notification
     */
    public function setDateNotif($dateNotif)
    {
        $this->dateNotif = $dateNotif;

        return $this;
    }

    /**
     * Get dateNotif
     *
     * @return \DateTime
     */
    public function getDateNotif()
    {
        return $this->dateNotif;
    }

    /**
     * Set lien
     *
     * @param string $lien
     *
     * @return notification
     */
    public function setLien($lien)
    {
        $this->lien = $lien;

        return $this;
    }

    /**
     * Get lien
     *
     * @return string
     */
    public function getLien()
    {
        return $this->lien;
    }
}

