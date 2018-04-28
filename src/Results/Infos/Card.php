<?php

namespace CJF\ThinkIot\Results\Infos;

/**
 * @property string $end_date 资费套餐结束时间（yyyy-MM-dd）
 * @property string $batch_id 导入批次ID
 * @property string $imsi 唯一标识
 * @property string $vic 通讯服务
 * @property string $iccid
 * @property integer $trade_id Sim卡订单编号
 * @property string $cust_name 企业客户名称
 * @property string $msisdn 物联网卡号
 * @property string $initproduct 初始产品编号
 * @property string $channel_cust_id 企业客户ID
 * @property string $start_date 资费套餐开始时间（yyyy-MM-dd）
 * @property string $goods_name 资费套餐名称
 * @property string $first_call_time 激活时间（yyyy-MM-dd）
 * @property string $device_id 终端设备标识
 * @property string $service_name 服务名称
 * @property string $operators_name 运营商名称
 * @property string $pre_destroy_time 库存/待激活时间（yyyy-MM-dd）
 * @property string $user_id 用户编号
 * @property string $retail_name 零售资费套餐
 * @property string $pool_id 流量池
 * @property string $operators_id 运营商编号
 * @property string $indate 导入库存时间（yyyy-MM-dd）
 * @property string $state_code 卡状态
 * @property string $cust_id 个体客户编号
 * @property string $custname 个体客户
 * @property string $use_total 已使用总量（KB）
 *
 * @package CJF\ThinkIot\Results\Infos
 */
class Card extends Data { }