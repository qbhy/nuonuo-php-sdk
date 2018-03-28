# nuonuo-php-sdk
诺诺开放平台SDK (非官方)

* [诺诺开放平台 API](https://open.jss.com.cn//interplatform/getApiList.do?index=1)

## 安装
```bash
$ composer require 96qbhy/nuonuo-php-sdk:dev-master
```

## 使用示例
```php
require 'vendor/autoload.php';

$config = [
    'appId'     => 'appId',
    'appSecret' => 'appSecret',
    'userTax'   => 'userTax',
];

$nuonuo = new \Qbhy\Nuonuo\Nuonuo($config);

// 查询请求开票信息接口
$result = $nuonuo->quickInvoice->querySpeedBilling();
var_dump($result);

// 自行调用
$result = $nuonuo->api->request('nuonuo.order.detailsQuery', [
    'companyId' => '',
    'id'        => ''
]);
var_dump($result);
```

96qbhy@gmail.com   