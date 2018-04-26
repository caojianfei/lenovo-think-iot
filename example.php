<?php

require_once __DIR__ . "/vendor/autoload.php";


$iccid = '';

$config = [
    'auth' => [
        'appkey' => 'your app key',
        'custid' => 'your cust id',
    ],
    'gateway_url' => 'http://thinkiotapi.lenovo.com/httpOpenServer/serviceProvide'
];

$manage = new \CJF\ThinkIot\ThinkManage($config);

$result = $manage->queryCardInfo($iccid);

$result_info = $result->getResultInfo();

dump($result_info);



