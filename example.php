<?php

require_once __DIR__ . "/vendor/autoload.php";

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

dump(env('name'));