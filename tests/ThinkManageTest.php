<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;


class ThinkManageTest extends TestCase
{
    protected $iccid = '89860617030000099971';

    /**
     * @depends testCanLoadConfig
     */
    public function testCanCreateManage(array $config): \CJF\ThinkIot\ThinkManage
    {
        $manage = new \CJF\ThinkIot\ThinkManage($config);

        $this->assertInstanceOf(
            \CJF\ThinkIot\ThinkManage::class,
            $manage
        );

        return $manage;
    }

    public function testCanLoadConfig(): array
    {
        $config = require __DIR__ . '/../config/lenovo-think.php';

        $this->assertTrue(is_array($config));

        $this->assertTrue(!empty($config['auth'])
            && !empty($config['auth']['appkey'])
            && !empty($config['auth']['custid'])
            && !empty($config['gateway_url']));

        return $config;
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
    }

    /**
     * @depends testCanCreateManage
     */
    public function testCanQueryCardInfo(\CJF\ThinkIot\ThinkManage $manage)
    {
        $result = $manage->queryCardInfo($this->iccid);

        $this->assertInstanceOf(\CJF\ThinkIot\Results\QueryCardInfoResult::class, $result);

        $this->assertJson($result->getOriginInfo());
    }

}