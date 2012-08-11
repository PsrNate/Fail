<?php

namespace Fail\StatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fail\StatBundle\Entity\Encounter
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Fail\StatBundle\Entity\EncounterRepository")
 */
class Encounter
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
     * @var integer $lostRounds
     *
     * @ORM\Column(name="lostRounds", type="integer")
     */
    private $lostRounds;

    /**
     * @var date $date
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;


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
     * Set lostRounds
     *
     * @param integer $lostRounds
     */
    public function setLostRounds($lostRounds)
    {
        $this->lostRounds = $lostRounds;
    }

    /**
     * Get lostRounds
     *
     * @return integer 
     */
    public function getLostRounds()
    {
        return $this->lostRounds;
    }

    /**
     * Set date
     *
     * @param date $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * Get date
     *
     * @return date 
     */
    public function getDate()
    {
        return $this->date;
    }
}