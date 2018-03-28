<?php
/**
 * User: 96qbhy
 * Date: 2018/3/28
 * Time: 上午11:45
 */

namespace Qbhy\Nuonuo;


use Pimple\Container;
use Pimple\ServiceProviderInterface as BaseServiceProvider;

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
    }

}