<?php

namespace AzthBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * 
 * @ORM\Entity(repositoryClass="AzthBundle\Repository\ItemsCollectionRankRepo")
 * @ORM\Table(name="azth_items_collection_rank")
 */
class ItemsCollectionRankEntity {

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
     * @ORM\Column(name="points", type="integer")
     *
     */
    private $points;
    
    /**
     * @var int
     *
     * @ORM\Column(name="collected_items", type="integer")
     *
     */
    private $collected_items;
    
    function getName() {
        return $this->name;
    }

    function getPoints() {
        return $this->points;
    }
    
    function getCollectedItems() {
        return $this->collected_items;
    }
}
