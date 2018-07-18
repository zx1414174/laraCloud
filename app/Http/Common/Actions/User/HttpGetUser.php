<?php
/**
 * 通过http请求获取用户信息
 */

namespace App\Http\Common\Actions\User;


use App\Http\Common\Enums\HttpResponseEnum;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class HttpGetUser
{
    /**
     * @param string $authorization_token 权限token
     * @return null|array
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @author pyh
     * @time 2018/6/25
     */
    public function execute($authorization_token)
    {
        $http_client = new Client();
        $url = env('LOCAL_APP_URL').'/api/auth/user';
        Log::error($url);
        $res = $http_client->request('get', $url, [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => $authorization_token,
            ]
        ]);
        $body = $res->getBody();
        Log::error($body);
        $return_arr = json_decode($body,true);
        if (isset($return_arr[HttpResponseEnum::RESPONSE_CODE_FIELD_NAME]) && $return_arr[HttpResponseEnum::RESPONSE_CODE_FIELD_NAME] == HttpResponseEnum::SUCCESS) {
            return $return_arr[HttpResponseEnum::RESPONSE_DATA_FIELD_NAME];
        };
        return null;
    }
}