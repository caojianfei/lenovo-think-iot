<?php

namespace CJF\ThinkIot\Results\Infos;


class BatchCard extends DataList
{
    protected $itemClass = Card::class;

    public function offsetGet($offset): Card
    {
        return $this->objArr[$offset];
    }
}