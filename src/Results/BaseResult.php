<?php

namespace CJF\ThinkIot\Results;


use CJF\ThinkIot\Contracts\Result;

abstract class BaseResult implements Result
{
    protected $errorCode = [
        '0000' => 'success',
        '0001' => 'IP error',
        '0002' => 'database exception',
        '0003' => 'IP not applied',
        '0010' => 'appKey not configured',
        '0011' => 'custId is not null',
        '0020' => 'sign is not null',
        '0021' => 'sign validators fail',
        '0031' => 'service not open',
        '0032' => 'serverName is not null',
        '1001' => 'service call failed',
        '1002' => 'system exception',
        '0041' => 'randomId is not null',
        '0042' => 'randomId format is error',
        '0043' => 'randomId is not repeat',
        '9000' => 'limit 10 times per minute',
        '9999' => 'other errors',
        '2002' => 'iccids is not null!',
        '2003' => 'simCardStatus is not null!',
        '2004' => 'no official description',
    ];

    /**
     * 接口请求结果原始数据
     *
     * @var string
     */
    protected $originResult = '';

    /**
     * 接口请求结果
     *
     * @var array
     */
    protected $result = [];

    /**
     * BaseResult constructor.
     * @param string $reult
     */
    public function __construct(string $reult)
    {
        $this->originResult = $reult;
        $this->result = $this->formatResult(json_decode($this->originResult, true));
    }

    /**
     * 获取接口返回原始数据
     *
     * @return string
     */
    public function getOriginInfo(): string
    {
        return $this->originResult;
    }

    /**
     * 获取接口返回数据中的 result info
     *
     * @return array
     */
    public function getResultInfo(): array
    {
        return $this->result['result_info'];
    }

    /**
     * 获取结果码
     *
     * @return string
     */
    public function getRespCode(): string
    {
        return $this->result['result_info']['resp_code'];
    }

    /**
     * 获取结果描述
     *
     * @return string
     */
    public function getRespDesc(): string
    {
        $code = $this->getRespCode();

        if (!empty($this->result['result_info']['resp_desc'])) {
            return  $this->result['result_info']['resp_desc'];
        }

        if (isset($this->errorCode[$code])) {
            return $this->errorCode[$code];
        }

        return 'unknown error';
    }

    /**
     * 判断接口请求是否成功
     *
     * @return bool
     */
    public function success()
    {
        return $this->getRespCode() === '0000' ? true : false;
    }

    /**
     * 统一返回结果格式为小写加下划线格式
     *
     * @param $result
     * @return array
     */
    protected function formatResult($result)
    {
        $format = [];

        foreach ($result as $key => $val) {
            if (is_string($key)) {
                if (strpos($key, '_')) {
                    $key = strtolower($key);
                } else {
                    $key = snake_case($key);
                }
            }

            if (is_array($val)) {
                $val = $this->formatResult($val);
            }

            $format[$key] = $val;
        }

        return $format;
    }

}