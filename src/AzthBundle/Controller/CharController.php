<?php

namespace AzthBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use ACore\System\Utils\ApiController;

/**
 *
 * @Route("/{_prefix}/azth/char/", defaults = { "_prefix" = "def" })
 */
class CharController extends ApiController {

    /**
     *
     * @Route("level_chart", name="char_level_chart")
     */
    public function getLevelChart(Request $req) {
        $res=array();
        
        $criteria=isset($_GET["search"]) ? strtolower($_GET["search"]) : NULL;
        $from =isset($_GET["from"]) ? $_GET["from"] : 0;
        
        $query=$this->getRepo($req)->createQueryBuilder('lvl');

        if ($criteria) {
            $query->where("LOWER(lvl.name) LIKE :search")->setParameter("search", "%$criteria%");
        }
        
        $query->setFirstResult($from);
        $query->setMaxResults(50);
        $res = $query->getQuery()
                ->useQueryCache(true)
                ->useResultCache(true)
                ->getArrayResult();
        
        foreach ($res as $key => $value) {
            $res[$key]=array("position" => $from+$key+1)+$res[$key];
        }

        return $this->serialize($res);
    }

    /**
     * 
     * @param Request $req
     * @return \Doctrine\ORM\EntityManager
     */
    protected function getEm(Request $req) {
        return parent::get("azth.char_mgr")->getCharEm($req->get("_prefix"));
    }
    
    /**
     * 
     * @param Request $req
     * @return \AzthBundle\Repository\CharacterXpChartsRepo
     */
    protected function getRepo(Request $req) {
        return parent::get("azth.char_mgr")->getCharXpChartsRepo($req->get("_prefix"));
    }

}
