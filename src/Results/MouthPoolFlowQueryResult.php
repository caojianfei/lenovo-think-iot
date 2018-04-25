<?php

namespace CJF\ThinkIot\Results;


use CJF\ThinkIot\Expections\LogicException;
use CJF\ThinkIot\Results\Infos\PollMonthFlow;

class MouthPoolFlowQueryResult extends BaseResult
{
    /**
     * @return PollMonthFlow
     * @throws LogicException
     */
    public function getMonthFlowInfo(): PollMonthFlow
    {
        if (!$this->success()) {
            throw new LogicException('operation fails, there is no info');
        }

        return new PollMonthFlow($this->getResultInfo());
    }

}