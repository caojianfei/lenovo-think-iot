<?php

namespace CJF\ThinkIot\Results\Infos;

/**
 *
 * @property string $area_id 区域编号
 * @property string $goods_release_id 资费编号
 * @property string $quantity 计划内最大总流量(KB)
 * @property string $total_num 总流量(KB)
 * @property string $use_total 已使用量（KB）
 * @property string $over_using True：超出流量池总量 False：未超出流量池总量
 * @property string $create_time 激活时间(yyyy-MM-dd hh:ss:mm)
 * @property string $channel_cust_id 企业客户编号
 * @property string $num 流量池中卡的总数量
 * @property string $pool_id 流量池编号
 * @property string $remark 备注
 * @property string $update_time 更改时间(yyyy-MM-dd hh:ss:mm)
 * @property string $operator_id 运营商编号
 * @property string $pool_name 流量池名称
 *
 * @package CJF\ThinkIot\Results\Infos
 */
class Poll extends Data
{

}