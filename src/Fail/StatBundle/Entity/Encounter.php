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
     * @var Player $winner
     *
     * @ORM\ManyToOne(targetEntity="Fail\StatBundle\Entity\Player")
     */
    private $winner;
    
    /**
     * @var integer $winner_elo
     *
     * @ORM\Column(name="winner_elo", type="integer")
     */
    private $winner_elo;
    
    /**
     * @var Player $loser
     *
     * @ORM\ManyToOne(targetEntity="Fail\StatBundle\Entity\Player")
     */
    private $loser;
    
    /**
     * @var integer $loser_elo
     *
     * @ORM\Column(name="loser_elo", type="integer")
     */
    private $loser_elo;
    
    /**
     * @var Event $event;
     *
     * @ORM\ManyToOne(targetEntity="Fail\StatBundle\Entity\Event")
     */
    private $event;

    public function __construct()
    {
        $this->date = new \DateTime;
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
    
    public function setWinner($winner)
    {
        $this->winner = $winner;
    }
    
    public function getWinner()
    {
        return $this->winner;
    }
    
    public function setLoser($loser)
    {
        $this->loser = $loser;
    }
    
    public function getLoser()
    {
        return $this->loser;
    }
    
    public function setEvent($event)
    {
        $this->event = $event;
    }
    
    public function getEvent()
    {
        return $this->event;
    }
    
    public function setWinnerElo($elo)
    {
        $this->winner_elo = $elo;
    }
    
    public function getWinnerElo()
    {
        return $this->winner_elo;
    }
    
    public function setLoserElo($elo)
    {
        $this->loser_elo = $elo;
    }
    
    public function getLoserElo()
    {
        return $this->loser_elo;
    }
}