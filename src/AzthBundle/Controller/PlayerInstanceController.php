<?php

namespace AzthBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use ACore\System\Utils\ApiController;

/**
 *
 * @Route("/{_prefix}/azth/char/", defaults = { "_prefix" = "def" })
 */
class PlayerInstanceController extends ApiController {

    /**
     *
     * @Route("player_instance", name="player_instance")
     */
    public function getPlayerInstance(Request $req) {
        $res = array();

        if ($req->query->has('guid') && $req->query->get('guid') != "") {
            $guid = strtolower($req->query->get('guid'));

            $query = $this->getRepo($req)->createQueryBuilder('pi');
            $query->where("pi.guid = " . $guid);
            $query->orderBy("pi.count", "DESC");

            $res = $query->getQuery()
                    ->useQueryCache(true)
                    ->useResultCache(true)
                    ->getArrayResult();

            return $this->serialize($res);
        }
        else
            return $this->serialize("Insert guid param");
    }

    /**
     *
     * @param Request $req
     * @return \AzthBundle\Repository\PlayerInstanceRepo
     */
    protected function getRepo(Request $req) {
        return parent::get("azth.char_mgr")->getPlayerInstanceRepo($req->get("_prefix"));
    }

}
