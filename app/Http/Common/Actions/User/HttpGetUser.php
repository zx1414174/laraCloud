<?php
/**
 * 通过http请求获取用户信息
 */

namespace App\Http\Common\Actions\User;


use App\Http\Common\Enums\HttpResponseEnum;
use GuzzleHttp\Client;

class HttpGetUser
{
    /**
     * @param string $authorization_token 权限token
     * @return null
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @author pyh
     * @time 2018/6/25
     */
    public function execute($authorization_token)
    {
        $http_client = new Client();
        $res = $http_client->request('get', route('auth.user.get'), [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => $authorization_token,
            ]
        ]);
        $body = $res->getBody();
        $return_arr = json_decode($body,true);
        if (isset($return_arr[HttpResponseEnum::RESPONSE_CODE_FIELD_NAME]) && $return_arr[HttpResponseEnum::RESPONSE_CODE_FIELD_NAME] == HttpResponseEnum::SUCCESS) {
            return $return_arr[HttpResponseEnum::RESPONSE_DATA_FIELD_NAME];
        };
        return null;
    }
}