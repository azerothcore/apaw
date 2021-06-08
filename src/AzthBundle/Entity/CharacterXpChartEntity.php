<?php

namespace AzthBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * 
 * @ORM\Entity(repositoryClass="AzthBundle\Repository\CharacterXpChartsRepo")
 * @ORM\Table(name="character_xp_charts")
 */
class CharacterXpChartEntity {

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string")
     * @ORM\Id
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="max_experience", type="integer")
     *
     */
    private $rate;

    /**
     * @var int
     *
     * @ORM\Column(name="level", type="integer")
     *
     */
    private $level;
    
    /**
     * @var int
     *
     * @ORM\Column(name="days", type="integer")
     *
     */
    private $days;
    
    /**
     * @var string
     *
     * @ORM\Column(name="latest_achi_date", type="string")
     *
     */
    private $latest_achi_date;
    
    /**
     * @var int
     *
     * @ORM\Column(name="points", type="integer")
     *
     */
    private $points;
    
    function getName() {
        return $this->name;
    }

    function getRate() {
        return $this->rate;
    }

    function getLevel() {
        return $this->level;
    }

    function getDays() {
        return $this->days;
    }

    function getLatestAchiDate() {
        return $this->latest_achi_date;
    }
    
    function getPoints() {
        return $this->points;
    }
}
