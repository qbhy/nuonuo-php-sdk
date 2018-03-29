<?php
/**
 * User: 96qbhy
 * Date: 2018/3/28
 * Time: 下午12:08
 */

namespace Qbhy\Nuonuo\AccessToken;

use Doctrine\Common\Cache\Cache;
use GuzzleHttp\Exception\RequestException;
use Hanson\Foundation\AbstractAccessToken;

class AccessToken extends AbstractAccessToken
{
    protected $expiresJsonKey = 'expires_in';
    protected $tokenJsonKey   = 'access_token';
    protected $granType       = 'client_credentials'; // 授权类型，此值固定为“client_credentials”
    protected $appId; // 填写应用的appKey
    protected $secret; // 填写应用的appSecret

    const TOKEN_API = 'https://open.jss.com.cn/accessToken';

    public function __construct($clientId, $clientSecret, Cache $cache)
    {
        $this->appId     = $clientId;
        $this->secret    = $clientSecret;
        $this->cache     = $cache;
        $this->cacheKey = md5($clientId . $clientSecret);
    }

    public function getTokenFromServer()
    {
        try {
            $response = $this->getHttp()->post(static::TOKEN_API, [
                'client_id'     => $this->appId,
                'client_secret' => $this->secret,
                'grant_type'    => $this->granType,
            ]);
        } catch (RequestException $exception) {
            $response = $exception->getResponse();
        }

        return json_decode(strval($response->getBody()), true);
    }

    public function checkTokenResponse($result)
    {
        if (isset($result['error']) && isset($result['error_description'])) {
            throw new AccessTokenException($result['error_description'], $result['error']);
        }
    }
}