<?php

namespace App\Http\Controllers\Auth;

use App\Http\Action\Token\GetPassportApiToken;
use App\Http\Controllers\Controller;
use App\Http\Tool\Common\HttpResponse;
use Illuminate\Http\Request;

class LoginController extends Controller
{
	/**
	 * 登录获取token
	 * @param Request $request
	 * @return \Illuminate\Http\JsonResponse
	 * @throws \App\Exceptions\Auth\Client\AuthTokenException
	 */
    public function login(Request $request)
	{
		return (new HttpResponse())->data((new GetPassportApiToken())->execute($request->username,$request->password));
	}
}
