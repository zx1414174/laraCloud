<?php
/**
 * 获取passport api token
 */

namespace App\Http\Action\Token;


use App\Exceptions\Auth\Client\AuthTokenException;
use App\Http\Tool\Common\InsideAccessTool;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class GetPassportApiToken
{
    /**
     * 获取token信息
     * @param $username
     * @param $password
     * @return array
     * @author:pyh
     * @time:2018/6/4
     * @throws AuthTokenException
     */
    public function execute($username,$password):array
    {
        try {
            $http_client = new Client();
            $form_params = [
                'grant_type'    => 'password',
                'client_id'     => env('OAUTH_APP_CLIENT_ID'),
                'client_secret' => env('OAUTH_APP_CLIENT_SECRET'),
                'username'      => $username,
                'password'      => $password,
                'scope'         => '*',
            ];
            $form_params[InsideAccessTool::SIGN_FIELD_NAME] = InsideAccessTool::makeAccessParamSign($form_params);
            $response = $http_client->post(env('APP_URL').'/oauth/token', [
                'form_params' => $form_params,
            ]);
            return json_decode($response->getBody()->getContents(),true);
        } catch (RequestException $exception) {
            $contents = $exception->getResponse()->getBody()->getContents();
            $error_data = json_decode($contents,true);
            throw new AuthTokenException($error_data['message']);
        } catch (\Exception $exception) {
            throw new AuthTokenException('获取token失败');
        }

    }

}