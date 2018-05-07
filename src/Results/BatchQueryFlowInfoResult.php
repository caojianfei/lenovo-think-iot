<?php

namespace CJF\ThinkIot\Results;


use CJF\ThinkIot\Expections\LogicException;
use CJF\ThinkIot\Results\Infos\BatchCardFlow;

class BatchQueryFlowInfoResult extends BaseResult
{
    /**
     * @return BatchCardFlow
     * @throws LogicException
     */
    public function getCardFlowList()
    {
        if (!$this->success()) {
            throw new LogicException('operation fails, there is no info');
        }

        $card_flow_list = $this->getResultInfo()['card_list'];

        return new BatchCardFlow($card_flow_list);
    }
}