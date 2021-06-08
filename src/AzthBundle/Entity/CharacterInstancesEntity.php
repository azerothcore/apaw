<?php

namespace AzthBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Entity(repositoryClass="AzthBundle\Repository\CharacterInstancesRepo")
 * @ORM\Table(name="azth_air_characters")
 */
class CharacterInstancesEntity {

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
     * @ORM\Column(name="raids", type="integer")
     */
    private $raids;

    /**
     * @var int
     *
     * @ORM\Column(name="dungeons", type="integer")
     */
    private $dungeons;

    /**
     * @var int
     *
     * @ORM\Column(name="Points", type="integer")
     */
    private $Points;

    /**
     * @var int
     *
     * @ORM\Column(name="account", type="integer")
     */
    private $account;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string")
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="race", type="integer")
     */
    private $race;

    /**
     * @var int
     *
     * @ORM\Column(name="class", type="integer")
     */
    private $class;

    /**
     * @var int
     *
     * @ORM\Column(name="gender", type="integer")
     */
    private $gender;

    /**
     * @var int
     *
     * @ORM\Column(name="level", type="integer")
     */
    private $level;

    /**
     * @var string
     *
     * @ORM\Column(name="guildName", type="string")
     */
    private $guildName;

    function getGuid()      { return $this->guid; }
    function getCount()     { return $this->count; }
    function getAccount()   { return $this->account; }
    function getName()      { return $this->name; }
    function getRace()      { return $this->race; }
    function getClass()     { return $this->class; }
    function getGender()    { return $this->gender; }
    function getLevel()     { return $this->level; }
    function getGuildName() { return $this->guildName; }
    function getPoints()    { return $this->Points; }
}
