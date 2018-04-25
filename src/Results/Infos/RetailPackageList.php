<?php

namespace CJF\ThinkIot\Results\Infos;


class RetailPackageList extends DataList
{

    protected $itemClass = RetailPackage::class;

    public function offsetGet($offset): RetailPackage
    {
        return $this->objArr[$offset];
    }

}