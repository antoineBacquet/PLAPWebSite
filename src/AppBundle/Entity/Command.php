<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Command
 *
 * @ORM\Table(name="command")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CommandRepository")
 */
class Command
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
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $issuer;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=255)
     */
    private $state;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="User")
     *
     */
    private $contractor;

    /**
     * @var int
     *
     * @ORM\OneToMany(targetEntity="CommandItem", mappedBy="command")
     *
     */
    private $items;

    /**
     * @var
     *
     * @ORM\Column(name="date", type="date", nullable=true)
     *
     */
    private $date;

    /**
     * @var
     *
     * @ORM\Column(name="evepraisal", type="string", length=255, nullable=true)
     *
     */
    private $evepraisal;

    public function __construct()
    {

        $this->items = new  ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set issuer
     *
     * @param integer $issuer
     *
     * @return Command
     */
    public function setIssuer($issuer)
    {
        $this->issuer = $issuer;
    
        return $this;
    }

    /**
     * Get issuer
     *
     * @return integer
     */
    public function getIssuer()
    {
        return $this->issuer;
    }

    /**
     * Set state
     *
     * @param string $state
     *
     * @return Command
     */
    public function setState($state)
    {
        $this->state = $state;
    
        return $this;
    }

    /**
     * Get state
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set contractor
     *
     * @param string $contractor
     *
     * @return Command
     */
    public function setContractor($contractor)
    {
        $this->contractor = $contractor;
    
        return $this;
    }

    /**
     * Get contractor
     *
     * @return string
     */
    public function getContractor()
    {
        return $this->contractor;
    }

    /**
     * Set items
     *
     * @param string $items
     *
     * @return Command
     */
    public function setItems($items)
    {
        $this->items = $items;
    
        return $this;
    }

    /**
     * Get items
     *
     * @return string
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Add item
     *
     * @param \AppBundle\Entity\Item $item
     *
     * @return Command
     */
    public function addItem(\AppBundle\Entity\Item $item)
    {
        $this->items[] = $item;
    
        return $this;
    }

    /**
     * Remove item
     *
     * @param \AppBundle\Entity\Item $item
     */
    public function removeItem(\AppBundle\Entity\Item $item)
    {
        $this->items->removeElement($item);
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Command
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set evepraisal
     *
     * @param string $evepraisal
     *
     * @return Command
     */
    public function setEvepraisal($evepraisal)
    {
        $this->evepraisal = $evepraisal;
    
        return $this;
    }

    /**
     * Get evepraisal
     *
     * @return string
     */
    public function getEvepraisal()
    {
        return $this->evepraisal;
    }
}