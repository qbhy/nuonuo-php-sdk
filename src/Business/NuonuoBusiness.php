<?php
/**
 * User: 96qbhy
 * Date: 2018/3/28
 * Time: 下午4:30
 */

namespace Qbhy\Nuonuo\Business;


use Qbhy\Nuonuo\Api;

class NuonuoBusiness
{
    /** @var Api */
    protected $api;

    public function __construct(Api $api)
    {
        $this->api = $api;
    }

    /**
     * @param       $method
     * @param array $params
     *
     * @return mixed
     */
    public function request($method, array $params = [])
    {
        return $this->api->request($method, $params);
    }

}