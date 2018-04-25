<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;


class ThinkManageTest extends TestCase
{
    protected $iccid = '89860617030000099971';


    public function testCanCreateManage()
    {
        $manage = new \CJF\ThinkIot\ThinkManage(null, new \GuzzleHttp\Client());

        $this->assertInstanceOf(
            \CJF\ThinkIot\ThinkManage::class,
            $manage
        );

        return $manage;
    }

    /**
     * @depends testCanCreateManage
     */
    public function testCanEditCardInfo(\CJF\ThinkIot\ThinkManage $manage)
    {
        $result = $manage->editCardInfo($this->iccid, '60');

        $this->assertInstanceOf(
            \CJF\ThinkIot\Results\EditCardInfoResult::class,
            $result
        );

        $this->assertJson($result->getOriginInfo());

        $this->assertArrayHasKey('respCode', $result->getResultInfo());

        $this->assertArrayHasKey('respDesc', $result->getResultInfo());
    }

    /**
     * @depends testCanCreateManage
     */
    public function testCanQueryCardInfo(\CJF\ThinkIot\ThinkManage $manage)
    {
        $result = $manage->queryCardInfo($this->iccid);

        $this->assertInstanceOf(\CJF\ThinkIot\Results\QueryCardInfoResult::class, $result);

        $this->assertJson($result->getOriginInfo());

        $this->assertArrayHasKey('respCode', $result->getResultInfo());

        $this->assertArrayHasKey('respDesc', $result->getResultInfo());
    }

    /**
     * @depends testCanCreateManage
     */
    public function testCardChangeInfo(\CJF\ThinkIot\ThinkManage $manage)
    {

    }
}