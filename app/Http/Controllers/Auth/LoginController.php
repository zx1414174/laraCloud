<?php

namespace App\Http\Controllers\Auth;

use App\Http\Common\Actions\Token\GetPassportApiToken;
use App\Http\Common\Traits\HttpResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Login\LoginRequest;

class LoginController extends Controller
{
    use HttpResponseTrait;
	/**
	 * 登录获取token
	 * @param LoginRequest $request
	 * @return \Illuminate\Http\JsonResponse
	 * @throws \App\Exceptions\Auth\Client\AuthTokenException
	 */
    public function login(LoginRequest $request)
	{
		return $this->data((new GetPassportApiToken())->execute($request->username,$request->password));
	}
}
