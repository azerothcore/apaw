<?php

namespace AzthBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Entity(repositoryClass="AzthBundle\Repository\PlayerInstanceRepo")
 * @ORM\Table(name="azth_air_player_detail")
 */
class PlayerInstanceEntity {

    /**
     * @var int
     *
     * @ORM\Column(name="guid", type="integer")
     * @ORM\Id
     */
    private $guid;

    /**
     * @var int
     *
     * @ORM\Column(name="levelPlayer", type="integer")
     */
    private $levelPlayer;

    /**
     * @var int
     *
     * @ORM\Column(name="levelParty", type="integer")
     */
    private $levelParty;

    /**
     * @var int
     *
     * @ORM\Column(name="criteria", type="integer")
     */
    private $criteria;

    /**
     * @var int
     *
     * @ORM\Column(name="date", type="integer")
     */
    private $date;

    /**
     * @var int
     *
     * @ORM\Column(name="difficulty", type="integer")
     */
    private $difficulty;

    /**
     * @var int
     *
     * @ORM\Column(name="count", type="integer")
     */
    private $count;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string")
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="exp", type="integer")
     */
    private $exp;

    /**
     * @var int
     *
     * @ORM\Column(name="phase", type="integer")
     */
    private $phase;

    /**
     * @var int
     *
     * @ORM\Column(name="bonus", type="integer")
     */
    private $bonus;

    /**
     * @var int
     *
     * @ORM\Column(name="is_raid", type="integer")
     */
    private $is_raid;

    function getGuid()        { return $this->guid; }
    function getLevelPlayer() { return $this->levelPlayer; }
    function getlevelParty()  { return $this->levelParty; }
    function getCriteria()    { return $this->criteria; }
    function getDate()        { return $this->date; }
    function getDifficulty()  { return $this->difficulty; }
    function getCount()       { return $this->count; }
    function getName()        { return $this->name; }
    function getExp()         { return $this->exp; }
    function getPhase()       { return $this->phase; }
    function getBonus()       { return $this->bonus; }
    function getIsRaid()    { return $this->is_raid; }
}
