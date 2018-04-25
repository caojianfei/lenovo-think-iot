# 联想 THINKIOT API 2.0 sdk

此扩展是联想 THINKIOT API 2.0 的 SDK，可以方便的在 Laravel 中集成。

## 安装
```
composer install caojianfei/lenovo-think-iot
```

## 配置

```
[
    'auth' => [
        'appkey' => '',
        'custid' => '',
    ],
    'gateway_url' => '' # 网关地址，默认 http://thinkiotapi.lenovo.com/httpOpenServer/serviceProvide
];
```

* 在 Laravel 中自定义配置

在命令行下运行

```
php artisan vendor:publish
```
然后在 `config` 目录下的 `lenovo-think.php` 中修改配置。

* 在其他项目中自定义配置

可以直接在实例化 `ThinkManage` 这个类的时候第一个参数传入配置或者配置的文件路径。


## 使用

### 在 Laravel 框架中使用

* 调用示例

使用 Facade 

```
# 查询流量卡信息
Think::queryFlowInfo($iccid);

# 变更资费月套餐接口
Think::cardChangeInfo($iccid, $postageId);
```

直接使用

```
# 获取 sdk 实例
$think = app('thinkiot');

# 查询流量卡信息
$think->queryFlowInfo($iccid);

# 变更资费月套餐接口
$think->query($iccid, $postageId);
```

### 在其他项目中使用

```

$config = [
    'auth' => [
        'appkey' => '123456',
        'custid' => '654321',
    ],
    'gateway_url' => 'url' # 网关地址
];

#$config 也可以是配置的文件目录，例如 'configs/lenovo-think.php' 

$think = new \CJF\ThinkIot\ThinkManage($config);

# 查询流量卡信息
$think->queryFlowInfo($iccid);

# 变更资费月套餐接口
$think->query($iccid, $postageId);

```