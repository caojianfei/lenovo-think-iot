<?php

require_once __DIR__ . "/vendor/autoload.php";

try {
    $iccid = '89860617030000099971';

    $pollid = '6781514010000144';

    $custid = '3071442380713734';

    $manage = new \CJF\ThinkIot\ThinkManage(null, new \GuzzleHttp\Client());

    //$result = $manage->queryCardInfo($iccid);

    //$result = $manage->editCardInfo($iccid, '60');

    //$result = $manage->cardChangeInfo($iccid, '1');

    //$result = $manage->usePoolInfo('6781514010000144');

    //$result = $manage->eventPackageToCard($iccid, '100');

    //$result = $manage->superpositionPackageToPool($pollid,  '100');

    //$result = $manage->queryPoolListByCustomer('3071442380713734');

    //$result = $manage->queryBasicTraiffPlan($custid);

    //$result = $manage->queryCustomerTraiffResaleStatus();

//    $result = $manage->createAccountInfo([
//        'custId' => $custid,
//        'roleId' => 1,
//        'userName' => 'caojianfei',
//        'passWord' => '123456',
//        'channelCustName' => 'cjf',
//        'email' => '120631902@qq.com',
//        'contactPerson' => '操健飞',
//        'phone' => '15869181957'
//    ]);

    //$result = $manage->batchEditCardInfo('89860617030000099997,89860617030000099971', '60', $custid);

    //$result = $manage->smsSending($iccid, 'hello word');

    //$result = $manage->sendSmsByPhone('15869181957', 'hello word');

    //$result = $manage->dayFlowQuery($custid, date('Y-m-d'), $iccid); //失败

    //$result = $manage->mouthFlowQuery($custid, date('Y-m'), $iccid); //失败

    //$result = $manage->dayPoolFlowQuery($custid, date('Y-m-d'), $pollid);//失败

    //$result = $manage->mouthPoolFlowQuery($custid, date('Y-m'), $pollid);

    //$result = $manage->queryFlowInfo($iccid);


    //dump($result->getOriginInfo());


} catch (\CJF\ThinkIot\Expections\InvalidArgumentException$e) {
    var_dump($e);
}


