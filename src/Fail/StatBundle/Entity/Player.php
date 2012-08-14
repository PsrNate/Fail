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
     * @var integer $matches_count
     *
     * @ORM\Column(name="matches_count", type="integer")
     */
    private $matches_count;

    public function __construct()
    {
        $this->elo = 1000;
        $this->matches_count = 0;
        $this->veteran = false;
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
    
    public function updateElo($rounds, $opp_elo, $opp_rounds)
    {
        // Calcul de p(D) (probabilité de victoire(différence de force))
        $d = $opp_elo - $this->elo; // Inversé pour alléger la formule
        $p = 1 / (1 + 10 * ($d / 400));
        
        // Calcul de W (résultat de la confrontation)
        $w = $rounds / ($rounds + $opp_rounds);
        
        // Calcul de K (coefficient de développement)
        $k;
        if ($this->matches_count <= 30)
            $k = 30;
        else if (!$this->veteran)
            $k = 15;
        else
            $k = 10;
        
        // Mise à jour de l'indice et du nombre de matches
        $this->elo = round($this->elo + $k * ($w - $p));
        $this->matches_count++;
        
        // Vérification du statut vétéran
        if ($this->elo >= 2400)
            $this->veteran = true;
    }
    
    public function getMatchesCount()
    {
        return $this->matches_count;
    }
}