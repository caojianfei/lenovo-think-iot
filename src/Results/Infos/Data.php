<?php

namespace CJF\ThinkIot\Results\Infos;


abstract class Data
{

    protected $data = [];

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function toArray(): array
    {
        return $this->data;
    }

    public function __get($name)
    {
        return $this->data[$name] ?? null;
    }

}