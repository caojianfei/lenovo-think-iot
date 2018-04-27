<?php

namespace CJF\ThinkIot\Results;


use CJF\ThinkIot\Results\Infos\Card;
use CJF\ThinkIot\Expections\LogicException;

class QueryCardInfoResult extends BaseResult
{
    protected $cardInfo;

    public function __construct(string $reult)
    {
        parent::__construct($reult);

        $result = $this->result;

        $card_info = $result['resultInfo']['cardInfo'];

        $new_card_info = [];

        foreach ($card_info as $key => $val) {
            $new_card_info[strtolower($key)] = $val;
        }

        $result['resultInfo']['cardInfo'] = $new_card_info;

        $this->result = $result;
    }

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