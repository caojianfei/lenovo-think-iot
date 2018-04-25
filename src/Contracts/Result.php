<?php

namespace CJF\ThinkIot\Contracts;


interface Result
{
    /**
     * 获取接口返回的原始数据
     *
     * @return string
     */
    public function getOriginInfo(): string ;

    /**
     * 获取接口返回的 resultInfo
     *
     * @return array
     */
    public function getResultInfo(): array ;

    /**
     * 获取接口返回的结果码
     *
     * @return string
     */
    public function getRespCode(): string ;

    /**
     * 获取接口返回的结果描述
     *
     * @return string
     */
    public function getRespDesc(): string;

}
