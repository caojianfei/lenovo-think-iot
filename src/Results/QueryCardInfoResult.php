<?php

namespace CJF\ThinkIot\Results;


use CJF\ThinkIot\Results\Infos\Card;
use CJF\ThinkIot\Expections\LogicException;

class QueryCardInfoResult extends BaseResult
{
    protected $cardInfo;

    /**
     * @return Card
     * @throws LogicException
     */
    public function getCardInfo(): Card
    {
        if (!$this->success()) {
            throw new LogicException('operation fails, there is no info');
        }

        return new Card($this->getResultInfo()['cardInfo']);
    }
}