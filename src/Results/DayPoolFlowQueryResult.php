<?php

namespace CJF\ThinkIot\Results;


use CJF\ThinkIot\Expections\LogicException;
use CJF\ThinkIot\Results\Infos\PollDayFlow;

class DayPoolFlowQueryResult extends BaseResult
{
    /**
     * @return PollDayFlow
     * @throws LogicException
     */
    public function getDayFlowInfo(): PollDayFlow
    {
        if (!$this->success()) {
            throw new LogicException('operation fails, there is no info');
        }

        return new PollDayFlow($this->getResultInfo());
    }
}