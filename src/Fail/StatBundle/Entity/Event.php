<?php

namespace Fail\StatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fail\StatBundle\Entity\Event
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Fail\StatBundle\Entity\EventRepository")
 */
class Event
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var integer $month
     *
     * @ORM\Column(name="month", type="integer")
     */
    private $month;

    /**
     * @var integer $year
     *
     * @ORM\Column(name="year", type="integer")
     */
    private $year;
    
    public function __toString()
    {
        return $this->getName().' '.$this->getYear();
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
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set month
     *
     * @param integer $month
     */
    public function setMonth($month)
    {
        $this->month = $month;
    }

    /**
     * Get month
     *
     * @return integer 
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * Set year
     *
     * @param integer $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * Get year
     *
     * @return integer 
     */
    public function getYear()
    {
        return $this->year;
    }
}