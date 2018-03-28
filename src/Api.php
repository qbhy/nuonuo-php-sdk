<?php
/**
 * User: qbhy
 * Date: 2018/3/28
 * Time: 上午11:19
 */

namespace Qbhy\Nuonuo;

use Hanson\Foundation\AbstractAPI;
use Hanson\Foundation\Http;

class Api extends AbstractAPI
{
    const API = 'http://sdk.jss.com.cn/openPlatform/services';
    const HTTPS_API = 'http://sdk.jss.com.cn/openPlatform/services';

    protected $useHttps = true;
    protected $appRate = 10; // APP氢气频率
    protected $dataType = 'json';  // 数据格式(xml/json)【消息头】
    protected $signMethod = 'AES'; // 加密方式
    protected $accessToken;
    protected $userTax; // 授权商户的税号（商家应用非必填，服务商应用必填）【消息头】
    protected $compress; // 压缩方式【消息头】
    protected $appKey; // 平台分配给应用的appKey【消息头】
    protected $version = 'V1.0.0';

    public function __construct(AccessToken $accessToken, $appKey, $userTax = null)
    {
        $this->appKey      = $appKey;
        $this->accessToken = $accessToken;
        $this->userTax     = $userTax;
    }

    public function request($method, array $params = [])
    {
        $url = $this->useHttps ? static::HTTPS_API : static::API;

        $params['method'] = $method;

        $response = $this->getHttp()->request($url, 'POST', $this->generateOptions($params));

        return json_decode(strval($response->getBody()), true);
    }

    public function generateOptions($params = [])
    {
        /**
         * 默认请求头
         * userTax    String    N    授权商户的税号（商家应用非必填，服务商应用必填）【消息头】
         * compress    String    N    压缩方式【消息头】
         * appKey    String    Y    平台分配给应用的appKey【消息头】
         * appRate    String    Y    APP请求频率(默认10次/秒)【消息头】
         * dataType    String    Y    数据格式(xml/json)【消息头】
         * signMethod    String    Y    加密方式(默认AES)【消息头】
         * accessToken    String    Y    授权码【消息头】
         */

        $headers = [
            'compress'    => $this->compress,
            'appKey'      => $this->appKey,
            'appRate'     => $this->appRate,
            'dataType'    => $this->dataType,
            'signMethod'  => $this->signMethod,
            'accessToken' => $this->accessToken->getToken(),
        ];

        $this->userTax ? $headers['userTax'] = $this->userTax : null;

        // 默认请求参数
        $params = array_merge([
            'version'   => $this->version,
            'timestamp' => time(),
        ], $params);

        $options = [
            'json'    => $params,
            'headers' => $headers,
        ];

        return $options;
    }

    /**
     * @param string $version
     *
     * @return static
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * @return bool
     */
    public function isUseHttps()
    {
        return $this->useHttps;
    }

    /**
     * @param bool $useHttps
     *
     * @return Api
     */
    public function setUseHttps($useHttps)
    {
        $this->useHttps = $useHttps;

        return $this;
    }

    /**
     * @param mixed $compress
     *
     * @return Api
     */
    public function setCompress($compress)
    {
        $this->compress = $compress;

        return $this;
    }

    /**
     * @param int $appRate
     *
     * @return Api
     */
    public function setAppRate($appRate)
    {
        $this->appRate = $appRate;

        return $this;
    }

    /**
     * @param string $dataType
     *
     * @return Api
     */
    public function setDataType($dataType)
    {
        $this->dataType = $dataType;

        return $this;
    }

    /**
     * @param string $signMethod
     *
     * @return Api
     */
    public function setSignMethod($signMethod)
    {
        $this->signMethod = $signMethod;

        return $this;
    }

    /**
     * @param Http $http
     *
     * @return static
     */
    public function setHttp($http)
    {
        $this->http = $http;

        return $this;
    }


}