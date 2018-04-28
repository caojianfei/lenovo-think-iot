<?php

namespace CJF\ThinkIot\Results\Infos;


/**
 * @property string $query_date         查询日期（yyyyMMdd）
 * @property string $use_flow_total     已使用总量(套餐/流量池)(KB)
 * @property string $flow_total         计划内流量总量(套餐/流量池)(KB)
 * @property string $use_flow_total_day 日使用总量(KB)
 *
 * @package CJF\ThinkIot\Results\Infos
 */
class PollDayFlow extends Data { }