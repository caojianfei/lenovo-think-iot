<?php

namespace CJF\ThinkIot\Results\Infos;


class BasicPackageList extends DataList
{
    protected $itemClass = BasicPackage::class;

    public function offsetGet($offset): BasicPackage
    {
        return $this->objArr[$offset];
    }
}