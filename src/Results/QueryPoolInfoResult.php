<?php

namespace CJF\ThinkIot\Results;


use CJF\ThinkIot\Expections\LogicException;
use CJF\ThinkIot\Results\Infos\PoolCards;

class QueryPoolInfoResult extends BaseResult
{
    /**
     * @return PoolCards
     * @throws LogicException
     */
    public function getPoolCards(): PoolCards
    {
        if (!$this->success()) {
            throw new LogicException('operation fails, there is no info');
        }

        $cards = $this->getResultInfo()['pool_list'];

        return new PoolCards($cards);
    }

}