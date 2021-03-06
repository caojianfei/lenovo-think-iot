<?php

namespace CJF\ThinkIot\Results;


class SmsSendingResult extends BaseResult
{
    /**
     * @return null|string
     */
    public function getSmsId()
    {
        if (!$this->success()) {
            return null;
        }
        return $this->getResultInfo()['sms_id'];
    }

    /**
     * @return null|string
     */
    public function getSendSmsTag()
    {
        if (!$this->success()) {
            return null;
        }
        return $this->getResultInfo()['send_sms_tag'];
    }

}