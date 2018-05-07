<?php

require_once __DIR__ . "/vendor/autoload.php";


//dd(snake_case('resultInfo'));

$string = '{
  "resultInfo": {
    "respDesc": "success",
    "cardInfo": {
      "data": [
        {
          "end_date": "2018-04-30",
          "batch_id": "4012358050159635",
          "imsi": "460060063054526",
          "vic": "",
          "iccid": "89860617030000545262",
          "trade_id": 1010724270446274,
          "cust_name": "万达电影城",
          "msisdn": "861064630381302",
          "initproduct": "41815240000077",
          "channel_cust_id": "3071740250018857",
          "start_date": "2018-04-13",
          "goods_name": "月付共享001",
          "firstCallTime": "",
          "device_id": "",
          "service_name": "停用",
          "operators_name": "中国联通",
          "preDestroyTime": "",
          "user_id": "3070028390111555",
          "retail_name": "test2",
          "poolId": "",
          "operators_Id": "1",
          "indate": "2017-12-18",
          "state_code": "65",
          "cust_id": "3071740250018857",
          "custname": "万达电影城",
          "useTotal": "0"
        }
      ]
    },
    "respCode": "0000"
  }
}';

//$result = new \CJF\ThinkIot\Results\QueryCardInfoResult($string);
//
//$card_info = $result->getCardInfo();
//
//$doc = [];
//
//foreach ($card_info->toArray() as $key => $val) {
//
//    $type = gettype($val);
//    //dump(gettype($val));
//
//    $doc[] = "@property $type $" . $key . "";
//
//}
//
//$doc_str = implode("\r\n", $doc);
//
//dump($doc_str);

//
//dd($card_info);

//dump($result->getResultInfo());

//
$iccids = [
    '89860414111870618480',
    '89860414111870618478',
    '89860414111870618479',
    '89860617030000099989',
    '89860617030000099997',
    '89860617030000099971',
];

$config = [
    'auth' => [
        'appkey' => '3FcSM76ogS6CMwu0q10H2JCD47Q5nD',
        'custid' => '3071442380713734',
    ],
    'gateway_url' => 'http://thinkiotapi.lenovo.com/httpOpenServer/serviceProvide'
];
//
//$card_infos = [];
//
$manage = new \CJF\ThinkIot\ThinkManage($config);
//
//foreach ($iccids as $key => $iccid) {
//    $result = $manage->queryCardInfo($iccid);
//    if ($result->success()) {
//        $card_info = $result->getCardInfo()->toArray();
//        $card_infos[] = $card_info;
//    }
//}
//
//dd(json_encode($card_infos));

//$iccid = '89860617030000099971';

//$result = $manage->queryFlowInfo($iccid);
//dump(json_encode($result->getFlowInfo()->toArray()));
//
//$card_info = $manage->queryCardInfo($iccid);
//dump($card_info->getCardInfo());

//$result = $manage->dayFlowQuery($config['auth']['custid'], date('Y-m-d'));

//$result = $manage->dayPoolFlowQuery($config['auth']['custid'], date('Y-m-d'), '6781514010000144');

//$result = $manage->mouthPoolFlowQuery($config['auth']['custid'], date('Y-m'), '6781514010000144');
//dump($result->getResultInfo());


//$manage->batchQueryFlowInfo($iccids);