<?php

namespace AzthBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use ACore\System\Utils\ApiController;

/**
 *
 * @Route("/{_prefix}/azth/char/", defaults = { "_prefix" = "def" })
 */
class InstanceRanksController extends ApiController {

    /**
     *
     * @Route("instance_ranks", name="instance_ranks")
     */
    public function getInstanceRanks(Request $req) {
        $res = array();

        if ($req->query->has('search') && $req->query->get('search') != "")
            $search = strtolower($req->query->get('search'));
        else
            $search = NULL;

        if ($req->query->has('from') && $req->query->get('from') != "")
          $from = $req->query->get('from');
        else
          $from = 0;

        $query = $this->getRepo($req)->createQueryBuilder('ir');
        $query->orderBy("ir.count", "DESC");

        if ($search)
          $query->where("LOWER(ir.name) LIKE :search")->setParameter("search", "%$search%");


        $query->setFirstResult($from);
        $query->setMaxResults(50);
        $res = $query->getQuery()
                ->useQueryCache(true)
                ->useResultCache(true)
                ->getArrayResult();

        return $this->serialize($res);
    }

    /**
     *
     * @param Request $req
     * @return \AzthBundle\Repository\InstanceRanksRepo
     */
    protected function getRepo(Request $req) {
        return parent::get("azth.char_mgr")->getInstanceRanksRepo($req->get("_prefix"));
    }

}
