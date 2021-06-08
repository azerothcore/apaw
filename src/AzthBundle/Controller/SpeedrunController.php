<?php

namespace AzthBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use ACore\System\Utils\ApiController;

/**
 *
 * @Route("/{_prefix}/azth/char/", defaults = { "_prefix" = "def" })
 */
class SpeedrunController extends ApiController {

    /**
     *
     * @Route("speedrun", name="speedrun")
     */
    public function getSpeedrun(Request $req) {
        $res = array();

        if ($req->query->has('search') && $req->query->get('search') != "")
            $search = strtolower($req->query->get('search'));
        else
            $search = NULL;

        if ($req->query->has('from') && $req->query->get('from') != "")
          $from = $req->query->get('from');
        else
          $from = 0;

        $query = $this->getRepo($req)->createQueryBuilder('speedrun');

        if ($search)
            $query->where("LOWER(speedrun.players) LIKE :search")->setParameter("search", "%$search%");

        $query->setFirstResult($from);
        $query->setMaxResults(50);
        $query->getQuery()->useResultCache(true)
                ->setResultCacheLifetime(0) //Query Cache lifetime
                ->setResultCacheId("speedrun"); //Query Cache Id
        $res = $query->getQuery()
        ->useQueryCache(true)
        ->useResultCache(true)
        ->getArrayResult();

        foreach ($res as $key => $value)
            $res[$key] = array("position" => $from+$key+1)+$res[$key];

        return $this->serialize($res);
    }

    /**
     *
     * @param Request $req
     * @return \AzthBundle\Repository\SpeedrunRepo
     */
    protected function getRepo(Request $req) {
        return parent::get("azth.char_mgr")->getSpeedrunRepo($req->get("_prefix"));
    }

}
