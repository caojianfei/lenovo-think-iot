<?php

namespace CJF\ThinkIot\Results\Infos;

/**
 * @property string $goods_release_id     资费编号
 * @property string $flow_unit            流量单位（KB）
 * @property string $release_cycle        正式套餐生命周期（天）
 * @property string $goods_release_name   资费名称
 * @property string $test_package_cycle   测试包周期（天）
 * @property string $release_price   资费价格
 * @property string $goods_type      资费类型：
 *                                   0：月付单卡
 *                                   1：预付单卡
 *                                   2：预付共享
 *                                   6：月付共享
 *                                   8：单卡叠加包
 *                                   9：流量池叠加包
 *                                   10：测试包
 * @property string $test_flow_fee    测试包价格（元）
 * @property string $quantity_max    资费的计划内最大总量（KB）
 * @property string $end_date        资费失效时间(yyyy-MM-dd hh:ss:mm)
 * @property string $start_date      资费开始时间(yyyy-MM-dd hh:ss:mm)
 * @property string $test_package    测试包流量（KB）
 *
 * @package CJF\ThinkIot\Results\Infos
 */
class BasicPackage extends Data
{

}