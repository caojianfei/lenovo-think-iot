<?php

namespace CJF\ThinkIot\Results;


use CJF\ThinkIot\Expections\LogicException;
use CJF\ThinkIot\Results\Infos\BatchCard;

class BatchQueryCardInfosResult extends BaseResult
{
    /**
     * @return BatchCard
     * @throws LogicException
     */
    public function getCardList()
    {
        if (!$this->success()) {
            throw new LogicException('operation fails, there is no info');
        }
        $card_list = [];
        $list = $this->getResultInfo()['batch_simlist']['sim_list'];
        foreach ($list as $k => $v) {
            $card_list[] = $v['data'];
        }

        return new BatchCard($card_list);
    }


}