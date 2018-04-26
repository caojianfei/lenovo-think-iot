<?php

namespace CJF\ThinkIot;

use CJF\ThinkIot\Contracts\ThinkIot;
use CJF\ThinkIot\Expections\InvalidArgumentException;
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
use GuzzleHttp\Client;

class ThinkManage implements ThinkIot
{
    /**
     * 授权配置
     *
     * @var array
     */
    protected $config = [];

    /**
     * @var Client
     */
    protected $http;

    /**
     * ThinkManage constructor.
     * @param null $config
     * @param Client $http
     * @throws InvalidArgumentException
     */
    public function __construct($config = null)
    {
        $this->resolveConfig($config);

        $this->http = new Client();
    }

    /**
     * 编辑单卡信息
     *
     * @param string $iccid
     * @param string $simCardStatu
     * @return EditCardInfoResult
     */
    public function editCardInfo(string $iccid, string $simCardStatu): EditCardInfoResult
    {
        $server_name = 'Lao.base.editCardInfo.change';

        $result = $this->request(compact('iccid', $simCardStatu), $server_name);

        return new EditCardInfoResult($result);
    }

    /**
     * 获取单卡详情
     *
     * @param string $iccid
     * @return QueryCardInfoResult
     */
    public function queryCardInfo(string $iccid): QueryCardInfoResult
    {
        $server_name = 'Lao.base.queryCardInfo.query';

        $result = $this->request(compact('iccid'), $server_name);

        return new QueryCardInfoResult($result);
    }

    /**
     * 变更资费月套餐接口
     *
     * @param string $iccid
     * @param string $postageId
     * @return CardChangeInfoResult
     */
    public function cardChangeInfo(string $iccid, string $postageId): CardChangeInfoResult
    {
        $server_name = 'Lao.base.cardChangeInfo.change';

        $result = $this->request(compact('iccid', 'postageId'), $server_name);

        return new CardChangeInfoResult($result);
    }

    /**
     * 获取指定流量池用量
     *
     * @param string $poolId
     * @return UsePoolInfoResult
     */
    public function usePoolInfo(string $poolId): UsePoolInfoResult
    {
        $server_name = 'Lao.base.usePoolInfo.used';

        $result = $this->request(compact('poolId'), $server_name);

        return new UsePoolInfoResult($result);
    }

    /**
     * 使用事件包到指定卡
     *
     * @param string $iccid
     * @param string $goodsReleaseId 商品发布ID
     * @param string $TradeTypeCode  订单类型
     * @return EventPackageToCardResult
     */
    public function eventPackageToCard(string $iccid, string $goodsReleaseId, string $TradeTypeCode = '80'): EventPackageToCardResult
    {
        $server_name = 'Lao.base.eventPackageToCard.change';

        $result = $this->request(compact('iccid', 'goodsReleaseId', 'TradeTypeCode'), $server_name);

        return new EventPackageToCardResult($result);
    }

    /**
     * 使用叠加包到流量池
     *
     * @param string $poolId
     * @param string $goodsReleaseId
     * @param string $TradeTypeCode
     * @return SuperpositionPackageToPoolResult
     */
    public function superpositionPackageToPool(
        string $poolId,
        string $goodsReleaseId,
        string $TradeTypeCode = '320'): SuperpositionPackageToPoolResult
    {
        $server_name = 'Lao.base.superpositionPackageToPool.change';

        $result = $this->request(compact('poolId', 'goodsReleaseId', 'TradeTypeCode'), $server_name);

        return new SuperpositionPackageToPoolResult($result);
    }

    /**
     * 获取指定客户下的流量池列表
     *
     * @param string $custId
     * @return QueryPoolListByCustomer
     */
    public function queryPoolListByCustomer(string $custId): QueryPoolListByCustomer
    {
        $server_name = 'Lao.base.queryPoolListByCustomer.change';

        $result = $this->request(compact('custId'), $server_name);

        return new QueryPoolListByCustomer($result);
    }

    /**
     * 获取指定企业客户的资费套餐（基础套餐）
     *
     * @param string $custId
     * @param string $traiffPlanStatus
     * @return QueryBasicTraiffPlanResult
     */
    public function queryBasicTraiffPlan(string $custId, string $traiffPlanStatus = '2'): QueryBasicTraiffPlanResult
    {
        $server_name = 'Lao.base.queryBasicTraiffPlan.change';

        $result = $this->request(compact('custId', 'traiffPlanStatus'), $server_name);

        return new QueryBasicTraiffPlanResult($result);
    }

    /**
     * 获取指定企业客户的零售资费套餐（零售套餐）
     *
     * @param string $traiffResaleStatus
     * @return QueryCustomerTraiffResaleStatusResult
     */
    public function queryCustomerTraiffResaleStatus(string $traiffResaleStatus = '1'): QueryCustomerTraiffResaleStatusResult
    {
        $server_name = 'Lao.base.queryCustomerTraiffResaleStatus.change';

        $result = $this->request(compact('traiffResaleStatus'), $server_name);

        return new QueryCustomerTraiffResaleStatusResult($result);
    }

    /**
     * 创建平台登录账号信息
     *
     * @param array $data
     * @return CreateAccountInfoResult
     */
    public function createAccountInfo(array $data): CreateAccountInfoResult
    {
        $server_name = 'Lao.base.createAccountInfo.change';

        $result = $this->request($data, $server_name);

        return new CreateAccountInfoResult($result);
    }

    /**
     * 批量编辑Sim卡信息
     *
     * @param string $iccids
     * @param string $simCardStatus
     * @param string $custId
     * @return BatchEditCardInfoResult
     */
    public function batchEditCardInfo(
        string $iccids,
        string $simCardStatus,
        string $custId): BatchEditCardInfoResult
    {
        $server_name = 'Lao.base.batchEditCardInfo.change';

        $result = $this->request(compact('iccids', 'simCardStatus', 'custId'), $server_name);

        return new BatchEditCardInfoResult($result);
    }


    /**
     * 短信发送
     *
     * @param string $iccid
     * @param string $smsContent
     * @return SmsSendingResult
     */
    public function smsSending(string $iccid, string $smsContent): SmsSendingResult
    {
        $server_name = 'Lao.base.sms.smsSending';

        $result = $this->request(compact('iccid', 'smsContent'), $server_name);

        return new SmsSendingResult($result);
    }

    /**
     * 通过手机号发送短信
     *
     * @param string $phone
     * @param string $content
     * @param string|null $iccid
     * @return SendSmsByPhoneResult
     */
    public function sendSmsByPhone(string $phone, string $content, string $iccid = null): SendSmsByPhoneResult
    {
        $server_name = 'Lao.base.sms.sendSmsByPhone';

        $data = array_filter(compact('phone', 'content', 'iccid'));

        $result = $this->request($data, $server_name);

        return new SendSmsByPhoneResult($result);
    }

    /**
     * 单卡流量查询
     *
     * @param string $iccid
     * @return QueryFlowInfoResult
     */
    public function queryFlowInfo(string $iccid): QueryFlowInfoResult
    {
        $server_name = 'Lao.base.flow.queryFlowInfo';

        $result = $this->request(compact('iccid'), $server_name);

        return new QueryFlowInfoResult($result);
    }

    /**
     * 单卡日流量查询
     *
     * @param string $custId
     * @param string $dayDate
     * @param string $iccid
     * @return DayFlowQueryResult
     */
    public function dayFlowQuery(string $custId, string $dayDate, string $iccid = ''): DayFlowQueryResult
    {
        $server_name = 'Lao.base.query.dayFlowQuery';

        $result = $this->request(compact('iccid', 'dayDate', 'custId'), $server_name);

        return new DayFlowQueryResult($result);
    }

    /**
     * 单卡月流量查询
     *
     * @param string $custId
     * @param string $monthDate
     * @param string|null $iccid
     * @return MouthFlowQueryResult
     */
    public function mouthFlowQuery(string $custId, string $monthDate, string $iccid = ''): MouthFlowQueryResult
    {
        $server_name = 'Lao.base.query.mouthFlowQuery';

        $result = $this->request(compact('iccid', 'monthDate', 'custId'), $server_name);

        return new MouthFlowQueryResult($result);
    }

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
        string $poolId = null): DayPoolFlowQueryResult
    {
        $server_name = 'Lao.base.pool.dayPoolFlowQuery';

        $result = $this->request(compact('custId', 'queryDate', 'poolId'), $server_name);

        return new DayPoolFlowQueryResult($result);
    }

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
        string $poolId = null): MouthPoolFlowQueryResult
    {
        $server_name = 'Lao.base.pool.mouthPoolFlowQuery';

        $result = $this->request(compact('custId', 'queryDate', 'poolId'), $server_name);

        return new MouthPoolFlowQueryResult($result);
    }

    /**
     * 解析配置
     *
     * @param $config
     * @throws InvalidArgumentException
     */
    protected function resolveConfig($config)
    {
        if (! $config) {
            $config = __DIR__ . '/../config/lenovo-think.php';
        }

        if (is_string($config)) {

            if (!file_exists($config)) {
                throw new InvalidArgumentException("the config file [$config] not exist");
            }

            $config = require $config;
        }

        if (!is_array($config)) {
            throw new InvalidArgumentException('config is invalid, it`s must be array');
        }

        if (!$this->verifyConfig($config)) {
            throw new InvalidArgumentException('config must have appid and custid');
        }

        $this->config = $config;
    }

    /**
     * 验证配置的合法性
     *
     * @param array $config
     * @return bool
     */
    protected function verifyConfig(array $config)
    {
        return !empty($config['auth']['appkey']) && !empty($config['auth']['custid']);
    }

    /**
     * 发起 http 请求
     *
     * @param array $businessParams
     * @param string $serverName
     * @return string
     */
    protected function request(array $businessParams, string $serverName)
    {
        $param = $this->makeParam($businessParams, $serverName);

        $gateway = $this->config['gateway_url'] ?? 'http://thinkiotapi.lenovo.com/httpOpenServer/serviceProvide';

        $request_url = $gateway . '?' . http_build_query($param);

        $response = $this->http->get($request_url, ['verify' => false]);

        $contents = $response->getBody()->getContents();

        $contents = trim($contents);

        return $contents;
    }

    /**
     * 组装请求参数
     *
     * @param array $businessParams
     * @param string $serverName
     * @return array
     */
    protected function makeParam(array $businessParams, string $serverName)
    {
        $sys = [
            'appKey'     => $this->config['auth']['appkey'],
            'custId'     => $this->config['auth']['custid'],
            'serverName' => $serverName,
            'randomId'   => Helper::generateRandomId(),
        ];

        $param = array_merge($sys, $businessParams);

        $sign = Helper::generateSign($param);
        $param['sign'] = $sign;

        return $param;
    }
}