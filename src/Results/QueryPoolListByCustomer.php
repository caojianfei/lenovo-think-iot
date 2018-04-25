<?php

namespace CJF\ThinkIot\Results;


use CJF\ThinkIot\Results\Infos\PollList;
use CJF\ThinkIot\Expections\LogicException;

class QueryPoolListByCustomer extends BaseResult
{

    /**
     * @return PollList
     * @throws LogicException
     */
    public function getPoolList(): PollList
    {
        if (!$this->success()) {
            throw new LogicException('operation fails, there is no info');
        }

        $poll_list = $this->getResultInfo()['poolList']['poolList'];

        return new PollList($poll_list);
    }
}