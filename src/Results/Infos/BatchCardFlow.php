<?php

namespace CJF\ThinkIot\Results\Infos;


class BatchCardFlow extends DataList
{
    protected $itemClass = CardFlow::class;

    public function offsetGet($offset): CardFlow
    {
        return $this->objArr[$offset];
    }
}