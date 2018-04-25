<?php

namespace CJF\ThinkIot;

use Illuminate\Support\Facades\Facade;

class Think extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'thinkiot';
    }

}