<?php

namespace CJF\ThinkIot\Expections;


use CJF\ThinkIot\Contracts\Result;

class GatewayErrorException extends \Exception
{
    /**
     * @var Result
     */
    public $result;

    public function __construct(Result $result, $message = "", $code = 0, \Throwable $previous = null) {

        parent::__construct($message, $code, $previous);

        $this->result = $result;
    }
}