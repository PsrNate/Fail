<?php

namespace Fail\StatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fail\StatBundle\Entity\Player
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Fail\StatBundle\Entity\PlayerRepository")
 */
class Player
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
     * @var integer $elo
     *
     * @ORM\Column(name="elo", type="integer")
     */
    private $elo;

    /**
     * @var boolean $veteran
     *
     * @ORM\Column(name="veteran", type="boolean")
     */
    private $veteran;


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
     * Set elo
     *
     * @param integer $elo
     */
    public function setElo($elo)
    {
        $this->elo = $elo;
    }

    /**
     * Get elo
     *
     * @return integer 
     */
    public function getElo()
    {
        return $this->elo;
    }

    /**
     * Set veteran
     *
     * @param boolean $veteran
     */
    public function setVeteran($veteran)
    {
        $this->veteran = $veteran;
    }

    /**
     * Get veteran
     *
     * @return boolean 
     */
    public function getVeteran()
    {
        return $this->veteran;
    }
}