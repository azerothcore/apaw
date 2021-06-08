<?php

namespace AzthBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Entity(repositoryClass="AzthBundle\Repository\SpeedrunRepo")
 * @ORM\Table(name="air_speedrun_view")
 */
class SpeedrunEntity {

    /**
     * @var int
     *
     * @ORM\Column(name="points", type="integer")
     * @ORM\Id
     */
    private $points;

    /**
     * @var string
     *
     * @ORM\Column(name="players", type="string")
     */
    private $players;

    /**
     * @var string
     *
     * @ORM\Column(name="instance", type="string")
     */
    private $instance;


    /**
     * @var string
     *
     * @ORM\Column(name="difficulty", type="string")
     */
    private $difficulty;

    /**
     * @var string
     *
     * @ORM\Column(name="special_level", type="string")
     */
    private $special_level;

    /**
     * @var int
     *
     * @ORM\Column(name="player_level", type="integer")
     */
    private $player_level;

    /**
     * @var int
     *
     * @ORM\Column(name="bosses", type="integer")
     */
    private $bosses;

    /**
     * @var string
     *
     * @ORM\Column(name="started_at", type="string")
     */
    private $started_at;

    /**
     * @var string
     *
     * @ORM\Column(name="instance_completed_in", type="string")
     */
    private $instance_completed_in;
    
    /**
     * @var string
     *
     * @ORM\Column(name="quest_completed_in", type="string")
     */
    private $quest_completed_in;

    public function getPoints() {
        return $this->points;
    }

    public function getPlayers() {
        return $this->players;
    }

    public function getInstance() {
        return $this->instance;
    }

    public function getSpecial_level() {
        return $this->special_level;
    }

    public function getPlayer_level() {
        return $this->player_level;
    }

    public function getDifficulty() {
        return $this->difficulty;
    }

    public function getBosses() {
        return $this->bosses;
    }

    public function getStarted_at() {
        return $this->started_at;
    }

    public function getInstance_completed_in() {
        return $this->instance_completed_in;
    }

    public function getQuest_completed_in() {
        return $this->quest_completed_in;
    }
}
