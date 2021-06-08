<?php

namespace AzthBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use ACore\System\Utils\ApiController;

/**
 *
 * @Route("/{_prefix}/azth/char/", defaults = { "_prefix" = "def" })
 */
class CharacterInstancesController extends ApiController {

    /**
     *
     * @Route("character_instances", name="character_instances")
     */
    public function getCharactersRank(Request $req) {
        $res = array();

        if ($req->query->has('search') && $req->query->get('search') != "")
            $search = strtolower($req->query->get('search'));
        else
            $search = NULL;

        if ($req->query->has('from') && $req->query->get('from') != "")
          $from = $req->query->get('from');
        else
          $from = 0;

        $query = $this->getRepo($req)->createQueryBuilder('instances');

        if ($search)
            $query->where("LOWER(instances.name) LIKE :search")->setParameter("search", "%$search%");

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
     * @return \AzthBundle\Repository\CharacterInstancesRepo
     */
    protected function getRepo(Request $req) {
        return parent::get("azth.char_mgr")->getCharacterInstancesRepo($req->get("_prefix"));
    }

}
