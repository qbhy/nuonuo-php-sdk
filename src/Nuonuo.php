<?php
/**
 * User: qbhy
 * Date: 2018/3/28
 * Time: 上午11:10
 */

namespace Qbhy\Nuonuo;

use Doctrine\Common\Cache\Cache;
use Hanson\Foundation\Config;
use Hanson\Foundation\Foundation;
use Qbhy\Nuonuo\AccessToken\AccessToken;
use Qbhy\Nuonuo\Business\ElectronInvoice;
use Qbhy\Nuonuo\Business\IntelligentCoding;
use Qbhy\Nuonuo\Business\Merchant;
use Qbhy\Nuonuo\Business\QuickInvoice;
use Qbhy\Nuonuo\Business\SynergyOffice;


/**
 * @property Config            $config
 * @property Cache             $cache
 * @property AccessToken       $accessToken
 * @property Api               $api
 * @property Merchant          $merchant
 * @property ElectronInvoice   $electronInvoice
 * @property IntelligentCoding $intelligentCoding
 * @property QuickInvoice      $quickInvoice
 * @property SynergyOffice     $synergyOffice
 * @package Nuonuo
 */
class Nuonuo extends Foundation
{
    protected $providers = [
        ServiceProvider::class,
    ];

}