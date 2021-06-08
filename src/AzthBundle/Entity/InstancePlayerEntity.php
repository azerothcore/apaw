<?php

namespace AzthBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Entity(repositoryClass="AzthBundle\Repository\InstancePlayerRepo")
 * @ORM\Table(name="azth_air_instance_players")
 */
class InstancePlayerEntity {

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
     * @ORM\Column(name="guid", type="integer")
     */
    private $guid;

    /**
     * @var int
     *
     * @ORM\Column(name="count", type="integer")
     */
    private $count;

    /**
     * @var int
     *
     * @ORM\Column(name="account", type="integer")
     */
    private $account;

    /**
     * @var string
     *
     * @ORM\Column(name="charName", type="string")
     */
    private $charName;

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
     * @ORM\Column(name="charLevel", type="integer")
     */
    private $charLevel;

    /**
     * @var string
     *
     * @ORM\Column(name="guildName", type="string")
     */
    private $guildName;

    /**
     * @var int
     *
     * @ORM\Column(name="date", type="integer")
     */
    private $date;

    function getGuid()        { return $this->guid;       }
    function getCriteria()    { return $this->criteria;   }
    function getCount()       { return $this->count;      }
    function getAccount()     { return $this->account;    }
    function getCharName()    { return $this->charName;   }
    function getRace()        { return $this->race;       }
    function getClass()       { return $this->class;      }
    function getGender()      { return $this->gender;     }
    function getCharLevel()   { return $this->charLevel;  }
    function getGuildName()   { return $this->guildName;  }
    function getDate()        { return $this->date;       }
}
