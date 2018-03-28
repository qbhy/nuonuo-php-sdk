<?php
/**
 * User: 96qbhy
 * Date: 2018/3/28
 * Time: 上午11:45
 */

namespace Qbhy\Nuonuo;


use Pimple\Container;
use Pimple\ServiceProviderInterface as BaseServiceProvider;
use Qbhy\Nuonuo\Business\ElectronInvoice;
use Qbhy\Nuonuo\Business\IntelligentCoding;
use Qbhy\Nuonuo\Business\Merchant;
use Qbhy\Nuonuo\Business\QuickInvoice;
use Qbhy\Nuonuo\Business\SynergyOffice;

class ServiceProvider implements BaseServiceProvider
{
    public function register(Container $pimple)
    {
        $pimple['accessToken'] = function ($container) {
            /** @var \Qbhy\Nuonuo\Nuonuo $container */
            return new AccessToken($container->config->get('appId'), $container->config->get('appSecret'), $container->cache);
        };

        $pimple['api'] = function ($container) {
            /** @var \Qbhy\Nuonuo\Nuonuo $container */
            return new Api($container->accessToken, $container->config->get('appId'), $container->config->get('userTax', null));
        };

        $pimple['electronInvoice']   = function ($container) {
            /** @var \Qbhy\Nuonuo\Nuonuo $container */
            return new ElectronInvoice($container->api);
        };
        $pimple['intelligentCoding'] = function ($container) {
            /** @var \Qbhy\Nuonuo\Nuonuo $container */
            return new IntelligentCoding($container->api);
        };
        $pimple['merchant']          = function ($container) {
            /** @var \Qbhy\Nuonuo\Nuonuo $container */
            return new Merchant($container->api);
        };
        $pimple['quickInvoice']      = function ($container) {
            /** @var \Qbhy\Nuonuo\Nuonuo $container */
            return new QuickInvoice($container->api);
        };
        $pimple['synergyOffice']   = function ($container) {
            /** @var \Qbhy\Nuonuo\Nuonuo $container */
            return new SynergyOffice($container->api);
        };
    }

}