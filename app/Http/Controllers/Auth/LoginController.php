<?php

namespace App\Http\Controllers\Auth;

use App\Http\Common\Actions\Token\GetPassportApiToken;
use App\Http\Common\Tools\Common\VerificationCodeTool;
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
	 * @throws \App\Exceptions\Auth\Client\AuthTokenException|\App\Exceptions\VerificationCode\CodeErrorException
	 */
    public function login(LoginRequest $request)
	{
	    VerificationCodeTool::checkCode($request->phone,'login',$request->verification_code);
		return $this->responseData((new GetPassportApiToken())->execute($request->phone,$request->password));
	}
}
