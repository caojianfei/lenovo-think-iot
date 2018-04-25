<?php

namespace CJF\ThinkIot\Results\Infos;


class PollList extends DataList
{
    protected $itemClass = Poll::class;

    public function offsetGet($offset): Poll
    {
        return $this->objArr[$offset];
    }


}