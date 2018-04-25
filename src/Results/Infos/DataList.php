<?php

namespace CJF\ThinkIot\Results\Infos;


abstract class DataList implements \ArrayAccess
{
    protected $arr = [];

    protected $objArr = [];

    protected $itemClass;

    public function __construct(array $list)
    {
        $this->arr = $list;

        $this->toObject($list);
    }

    public function data(): array
    {
        return $this->arr;
    }

    public function offsetExists($offset)
    {
        return isset($this->objArr[$offset]);
    }

    public function offsetSet($offset, $value)
    {

    }

    public function offsetUnset($offset)
    {

    }

    protected function toObject(array $list)
    {
        if (!$this->itemClass) {
            return;
        }

        foreach ($list as $item) {
            $this->objArr[] = new $this->itemClass($item);
        }
    }

    abstract public function offsetGet($offset);


}