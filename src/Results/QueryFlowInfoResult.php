<?php

namespace CJF\ThinkIot\Results;


use CJF\ThinkIot\Results\Infos\CardFlow;
use CJF\ThinkIot\Expections\LogicException;

class QueryFlowInfoResult extends BaseResult
{

    /**
     * @return CardFlow
     * @throws LogicException
     */
    public function getFlowInfo(): CardFlow
    {
        if (!$this->success()) {
            throw new LogicException('operation fails, there is no info');
        }

        return new CardFlow($this->getResultInfo());
    }
}