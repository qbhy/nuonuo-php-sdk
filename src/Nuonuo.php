<?php
/**
 * User: qbhy
 * Date: 2018/3/28
 * Time: 上午11:10
 */

namespace Qbhy\Nuonuo;

use Hanson\Foundation\Foundation;


/**
 * @property \Hanson\Foundation\Config $config
 * @property \Doctrine\Common\Cache\Cache $cache
 * @property \Qbhy\Nuonuo\Api $api
 * @property \Qbhy\Nuonuo\AccessToken $accessToken
 * @package Nuonuo
 */
class Nuonuo extends Foundation
{
    protected $providers = [
        ServiceProvider::class,
    ];

}