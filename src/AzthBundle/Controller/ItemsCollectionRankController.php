<?php

namespace AzthBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use ACore\System\Utils\ApiController;

/**
 *
 * @Route("/{_prefix}/azth/char/", defaults = { "_prefix" = "def" })
 */
class ItemsCollectionRankController extends ApiController {

    /**
     *
     * @Route("items_collection_rank", name="items_collection_rank")
     */
    public function getItemsCollectionRank(Request $req) {
        $res = array();

        if ($req->query->has('search') && $req->query->get('search') != "")
            $search = strtolower($req->query->get('search'));
        else
            $search = NULL;

        if ($req->query->has('from') && $req->query->get('from') != "")
          $from = $req->query->get('from');
        else
          $from = 0;

        $query = $this->getRepo($req)->createQueryBuilder('items_collection_rank');

        if ($search)
            $query->where("LOWER(items_collection_rank.name) LIKE :search")->setParameter("search", "%$search%");

        $query->setFirstResult($from);
        $query->setMaxResults(50);
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
     * @return \AzthBundle\Repository\ItemsCollectionRankRepo
     */
    protected function getRepo(Request $req) {
        return parent::get("azth.char_mgr")->getItemsCollectionRankRepo($req->get("_prefix"));
    }

}
