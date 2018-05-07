<?php

namespace CJF\ThinkIot\Results;


class SendSmsByPhoneResult extends BaseResult
{
    /**
     * @return array|null
     */
    public function getSmsSendInfo()
    {
        if (isset($this->getResultInfo()['sms_send_info'])) {
            return json_decode($this->getResultInfo()['sms_send_info']);
        }

        return null;
    }
}