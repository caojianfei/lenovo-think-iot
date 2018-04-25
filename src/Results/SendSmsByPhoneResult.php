<?php

namespace CJF\ThinkIot\Results;


class SendSmsByPhoneResult extends BaseResult
{
    /**
     * @return array|null
     */
    public function getSmsSendInfo()
    {
        if (isset($this->getResultInfo()['smsSendInfo'])) {
            return json_decode($this->getResultInfo()['smsSendInfo']);
        }

        return null;
    }
}