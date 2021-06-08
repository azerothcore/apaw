<?php

namespace AzthBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use ACore\System\Utils\ApiController;

/**
 *
 * @Route("/{_prefix}/azth/char/", defaults = { "_prefix" = "def" })
 */
class InstancePlayerController extends ApiController {

    /**
     *
     * @Route("instance_player", name="instance_player")
     */
    public function getInstancePlayer(Request $req) {
        $res = array();

        if ($req->query->has('criteria') && $req->query->get('criteria') != "") {
            $criteria = strtolower($req->query->get('criteria'));

            if ($req->query->has('from') && $req->query->get('from') != "")
              $from = $req->query->get('from');
            else
              $from = 0;

            $query = $this->getRepo($req)->createQueryBuilder('ip');
            $query->where("ip.criteria = " . $criteria);

            $query->setFirstResult($from);
            $query->setMaxResults(50);
            $query->orderBy("ip.count", "DESC");	    

            $res = $query->getQuery()
                    ->useQueryCache(true)
                    ->useResultCache(true)
                    ->getArrayResult();

            return $this->serialize($res);
        }
        else
            return $this->serialize("Insert criteria param");
    }

    /**
     *
     * @param Request $req
     * @return \AzthBundle\Repository\InstancePlayerRepo
     */
    protected function getRepo(Request $req) {
        return parent::get("azth.char_mgr")->getInstancePlayerRepo($req->get("_prefix"));
    }

}
