<?php

namespace AzthBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Entity(repositoryClass="AzthBundle\Repository\InstanceRanksRepo")
 * @ORM\Table(name="azth_air_instance_ranks")
 */
class InstanceRanksEntity {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     */
    private $id;

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
     * @ORM\Column(name="level", type="integer")
     */
    private $level;

    /**
     * @var int
     *
     * @ORM\Column(name="bonus", type="integer")
     */
    private $bonus;

    /**
     * @var int
     *
     * @ORM\Column(name="criteria", type="integer")
     * @ORM\Id
     */
    private $criteria;

    /**
     * @var int
     *
     * @ORM\Column(name="count", type="integer")
     * @ORM\Id
     */
    private $count;
    
    /**
     * @var int
     *
     * @ORM\Column(name="is_raid", type="integer")
     */
    private $is_raid;

    function getId()        { return $this->id; }
    function getName()      { return $this->name; }
    function getExp()       { return $this->exp; }
    function getPhase()     { return $this->phase; }
    function getLevel()     { return $this->level; }
    function getBonus()     { return $this->bonus; }
    function getCriteria()  { return $this->criteria; }
    function getCount()     { return $this->count; }
    function getIsRaid()    { return $this->is_raid; }
}
