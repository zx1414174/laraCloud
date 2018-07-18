<?php
/**
 * 获取passport api token
 */

namespace App\Http\Common\Actions\Token;


use App\Exceptions\Auth\Client\AuthTokenException;
use App\Http\Common\Tools\Common\InsideAccessTool;
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
            $response = $http_client->post(env('LOCAL_APP_URL').'/oauth/token', [
                'form_params' => $form_params,
            ]);
            $response_data = json_decode($response->getBody()->getContents(),true);
            if (isset($response_data['statusCode']) && $response_data['statusCode'] != 200) {
                throw new AuthTokenException($response_data['message']);
            }
            return $response_data;
        } catch (RequestException $exception) {
            $response = $exception->getResponse();
            if ($response) {
                $contents = $exception->getResponse()->getBody()->getContents();
                $error_data = json_decode($contents,true);
                $message = $error_data['message'];
            } else {
                $message = '连接错误';
            }
            throw new AuthTokenException($message);
        } catch (\Exception $exception) {
            throw new AuthTokenException($exception->getMessage());
        }

    }

}