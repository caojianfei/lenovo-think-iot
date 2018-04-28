<?php

namespace CJF\ThinkIot\Results\Infos;

/**
 * @property string $iccid
 * @property string $imsi        运营商唯一标识
 * @property string $msisdn      卡号
 * @property string $quantity_max 计划内最大总流量
 * @property array $data_list    套餐列表
 * @property array $goods_list   当前卡拥有的套餐列表 【批量查询卡流量】 与data_list 含义相同
 * @property integer $use_totals 已使用量（KB） 【批量查询卡流量】
 *
 * @package CJF\ThinkIot\Results\Infos
 */
class CardFlow extends Data { }