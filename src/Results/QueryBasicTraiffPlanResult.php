<?php

namespace CJF\ThinkIot\Results;


use CJF\ThinkIot\Helper;
use CJF\ThinkIot\Expections\LogicException;
use CJF\ThinkIot\Results\Infos\BasicPackageList;

class QueryBasicTraiffPlanResult extends BaseResult
{
    public function __construct(string $reult)
    {
        parent::__construct($reult);

        if ($this->success()) {
            $basicPackageList = $this->result['resultInfo']['basicPackageList'];
            $this->result['resultInfo']['basicPackageList'] = Helper::listKeyToLower($basicPackageList);
        }
    }

    /**
     * @return BasicPackageList
     * @throws LogicException
     */
    public function getBasicPackageList(): BasicPackageList
    {
        if (!$this->success()) {
            throw new LogicException('operation fails, there is no info');
        }

        return new BasicPackageList($this->getResultInfo()['basicPackageList']);
    }

}