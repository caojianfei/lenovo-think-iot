<?php

namespace CJF\ThinkIot\Results;


use CJF\ThinkIot\Helper;
use CJF\ThinkIot\Expections\LogicException;
use CJF\ThinkIot\Results\Infos\RetailPackageList;

class QueryCustomerTraiffResaleStatusResult extends BaseResult
{
    public function __construct(string $reult)
    {
        parent::__construct($reult);

        if ($this->success()) {
            $retailPackageList = $this->result['result_info']['retail_package_list'];
            $this->result['result_info']['retail_package_list'] = Helper::listKeyToLower($retailPackageList);
        }
    }

    /**
     * @return RetailPackageList
     * @throws LogicException
     */
    public function getRetailPackageList(): RetailPackageList
    {
        if (!$this->success()) {
            throw new LogicException('operation fails, there is no info');
        }

        return new RetailPackageList($this->getResultInfo()['retail_package_list']);
    }

}