<?php

namespace CJF\ThinkIot\Results;


use CJF\ThinkIot\Expections\LogicException;
use CJF\ThinkIot\Results\Infos\CardDayFlow;

class MouthFlowQueryResult extends BaseResult
{
    /**
     * @return CardDayFlow
     * @throws LogicException
     */
    public function getMonthFlwoInfo(): CardDayFlow
    {
        if (!$this->success()) {
            throw new LogicException('operation fails, there is no info');
        }

        return new CardDayFlow($this->getResultInfo());
    }

}