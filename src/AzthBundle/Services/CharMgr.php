<?php

namespace AzthBundle\Services;

use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use ACore\CharDb\Utils\CharDbTrait;
use AzthBundle\Entity\CharacterXpChartEntity;
use AzthBundle\Entity\CharacterInstancesEntity;
use AzthBundle\Entity\InstanceRanksEntity;
use AzthBundle\Entity\PlayerInstanceEntity;
use AzthBundle\Entity\InstancePlayerEntity;
use AzthBundle\Entity\ItemsCollectionRankEntity;
use AzthBundle\Entity\SpeedrunEntity;

class CharMgr {

    use CharDbTrait;
    use ContainerAwareTrait;
    
    public function getCharXpChartsRepo($alias) {
        return $this->getCharEm($alias)->getRepository(CharacterXpChartEntity::class);
    }
    
    public function getCharacterInstancesRepo($alias) {
        return $this->getCharEm($alias)->getRepository(CharacterInstancesEntity::class);
    }

    public function getInstanceRanksRepo($alias) {
        return $this->getCharEm($alias)->getRepository(InstanceRanksEntity::class);
    }

    public function getPlayerInstanceRepo($alias) {
        return $this->getCharEm($alias)->getRepository(PlayerInstanceEntity::class);
    }
    
    public function getItemsCollectionRankRepo($alias) {
        return $this->getCharEm($alias)->getRepository(ItemsCollectionRankEntity::class);
    }

    public function getInstancePlayerRepo($alias) {
        return $this->getCharEm($alias)->getRepository(InstancePlayerEntity::class);
    }
    
    public function getSpeedrunRepo($alias) {
        return $this->getCharEm($alias)->getRepository(SpeedrunEntity::class);
    }
}
