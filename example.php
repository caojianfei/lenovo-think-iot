<?php

require_once __DIR__ . "/vendor/autoload.php";


$pool_id = '6781514010000144';

$config = require __DIR__ . "/config/lenovo-think.php";

try {

    $iccid = '123456';

    $api = new \CJF\ThinkIot\ThinkManage($config);

    // 查询卡详情
    $result = $api->queryCardInfo($iccid);
    $card_info = $result->getCardInfo();

    dump($card_info);

} catch (Exception $e) {
    print_r("errorCode: {$e->getCode()}; errorMsg: {$e->getMessage()}");
}


