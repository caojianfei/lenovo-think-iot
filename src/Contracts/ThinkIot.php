<?php

namespace CJF\ThinkIot\Contracts;


use CJF\ThinkIot\Results\BatchEditCardInfoResult;
use CJF\ThinkIot\Results\CardChangeInfoResult;
use CJF\ThinkIot\Results\CreateAccountInfoResult;
use CJF\ThinkIot\Results\DayFlowQueryResult;
use CJF\ThinkIot\Results\DayPoolFlowQueryResult;
use CJF\ThinkIot\Results\EditCardInfoResult;
use CJF\ThinkIot\Results\EventPackageToCardResult;
use CJF\ThinkIot\Results\MouthFlowQueryResult;
use CJF\ThinkIot\Results\MouthPoolFlowQueryResult;
use CJF\ThinkIot\Results\QueryBasicTraiffPlanResult;
use CJF\ThinkIot\Results\QueryCardInfoResult;
use CJF\ThinkIot\Results\QueryCustomerTraiffResaleStatusResult;
use CJF\ThinkIot\Results\QueryFlowInfoResult;
use CJF\ThinkIot\Results\QueryPoolListByCustomer;
use CJF\ThinkIot\Results\SendSmsByPhoneResult;
use CJF\ThinkIot\Results\SmsSendingResult;
use CJF\ThinkIot\Results\SuperpositionPackageToPoolResult;
use CJF\ThinkIot\Results\UsePoolInfoResult;


interface ThinkIot
{
    /**
     * 编辑单卡信息
     *
     * @param $iccid
     * @param $simCardStatu
     * @return EditCardInfoResult
     */
    public function editCardInfo(string $iccid, string $simCardStatu): EditCardInfoResult ;

    /**
     * 获取单卡详情
     *
     * @param string $iccid
     * @return QueryCardInfoResult
     */
    public function queryCardInfo(string $iccid): QueryCardInfoResult;

    /**
     * 变更资费月套餐接口
     *
     * @param string $iccid
     * @param string $postageId
     * @return CardChangeInfoResult
     */
    public function cardChangeInfo(string $iccid, string $postageId): CardChangeInfoResult;

    /**
     * 获取指定流量池用量
     *
     * @param string $poolId
     * @return UsePoolInfoResult
     */
    public function usePoolInfo(string $poolId): UsePoolInfoResult;

    /**
     * 使用事件包到指定卡
     *
     * @param string $iccid
     * @param string $goodsReleaseId 商品发布编号
     * @param string $TradeTypeCode 80：事件包
     * @return EventPackageToCardResult
     */
    public function eventPackageToCard(string $iccid, string $goodsReleaseId, string $TradeTypeCode): EventPackageToCardResult ;

    /**
     * 使用叠加包到流量池
     *
     * @param string $poolId 流量池产品编号
     * @param string $goodsReleaseId 商品发布ID
     * @param string $TradeTypeCode 320：叠加包
     * @return SuperpositionPackageToPoolResult
     */
    public function superpositionPackageToPool(
        string $poolId,
        string $goodsReleaseId,
        string $TradeTypeCode): SuperpositionPackageToPoolResult;

    /**
     * 获取指定客户下的流量池列表
     *
     * @param string $custId 客户编号
     * @return QueryPoolListByCustomer
     */
    public function queryPoolListByCustomer(string $custId): QueryPoolListByCustomer;

    /**
     * 获取指定企业客户的资费套餐（基础套餐）
     *
     * @param string $custId
     * @param string $traiffPlanStatus
     * @return QueryBasicTraiffPlanResult
     */
    public function queryBasicTraiffPlan(string $custId, string $traiffPlanStatus): QueryBasicTraiffPlanResult;

    /**
     * 获取指定企业客户的零售资费套餐（零售套餐）
     *
     * @param string $custId
     * @param string $traiffResaleStatus
     * @return QueryCustomerTraiffResaleStatusResult
     */
    public function queryCustomerTraiffResaleStatus(string $traiffResaleStatus): QueryCustomerTraiffResaleStatusResult;

    /**
     * 创建平台登录账号信息
     *
     * @param array $data
     * @return CreateAccountInfoResult
     */
    public function createAccountInfo(array $data): CreateAccountInfoResult;

    /**
     * 批量编辑Sim卡信息
     *
     * @param string $iccid
     * @param string $simCardStatus
     * @param string $custId
     * @return BatchEditCardInfoResult
     */
    public function batchEditCardInfo(
        string $iccids,
        string $simCardStatus,
        string $custId): BatchEditCardInfoResult;

    /**
     * 短信发送
     *
     * @param string $iccid
     * @param string $smsContent
     * @return SmsSendingResult
     */
    public function smsSending(string $iccid, string $smsContent): SmsSendingResult;

    /**
     * 通过手机号发送短信
     *
     * @param string $phone
     * @param string $content
     * @param string|null $iccid
     * @return SendSmsByPhoneResult
     */
    public function sendSmsByPhone(string $phone, string $content, string $iccid = null): SendSmsByPhoneResult;

    /**
     * 单卡流量查询
     *
     * @param string $iccid
     * @return QueryFlowInfoResult
     */
    public function queryFlowInfo(string $iccid): QueryFlowInfoResult;

    /**
     * 单卡日流量查询
     *
     * @param string $custId
     * @param string $dayDate
     * @param string $iccid
     * @return DayFlowQueryResult
     */
    public function dayFlowQuery(string $custId, string $dayDate, string $iccid): DayFlowQueryResult;

    /**
     * 单卡月流量查询
     *
     * @param string $custId
     * @param string $monthDate
     * @param string $iccid
     * @return MouthFlowQueryResult
     */
    public function mouthFlowQuery(string $custId, string $monthDate, string $iccid): MouthFlowQueryResult;

    /**
     * 流量池日流量查询
     *
     * @param string $custId
     * @param string $queryDate
     * @param string|null $poolId
     * @return DayPoolFlowQueryResult
     */
    public function dayPoolFlowQuery(
        string $custId,
        string $queryDate,
        string $poolId): DayPoolFlowQueryResult;

    /**
     * 流量池月流量查询
     *
     * @param string $custId
     * @param string $queryDate
     * @param string|null $poolId
     * @return MouthPoolFlowQueryResult
     */
    public function mouthPoolFlowQuery(
        string $custId,
        string $queryDate,
        string $poolId): MouthPoolFlowQueryResult;

}