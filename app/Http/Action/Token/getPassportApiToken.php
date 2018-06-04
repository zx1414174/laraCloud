<?php
/**
 * 获取passport api token
 */

namespace App\Http\Action\Token;


use GuzzleHttp\Client;

class getPassportApiToken
{
    /**
     * 获取token信息
     * @param $username
     * @param $password
     * @return array
     * @author:pyh
     * @time:2018/6/4
     */
    public function execute($username,$password):array
    {
        $http_client = new Client();
        $response = $http_client->post(env('APP_URL').'/oauth/token', [
            'form_params' => [
                'grant_type'    => 'password',
                'client_id'     => env('OAUTH_APP_CLIENT_ID'),
                'client_secret' => env('OAUTH_APP_CLIENT_SECRET'),
                'username'      => $username,
                'password'      => $password,
                'scope'         => '',
            ],
        ]);
        return json_decode($response->getBody()->getContents(),true);
    }

}