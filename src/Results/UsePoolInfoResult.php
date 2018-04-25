<?php

namespace CJF\ThinkIot\Results;


use CJF\ThinkIot\Results\Infos\Poll;
use CJF\ThinkIot\Expections\LogicException;

class UsePoolInfoResult extends BaseResult
{
    /**
     * @return Poll
     * @throws LogicException
     */
    public function getPollInfo(): Poll
    {
        if (!$this->success()) {
            throw new LogicException('operation fails, there is no info');
        }

        return new Poll($this->getResultInfo()['poolInfo']);
    }

}