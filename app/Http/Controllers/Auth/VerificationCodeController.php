<?php

namespace App\Http\Controllers\Auth;

use App\Http\Common\Tools\Common\VerificationCodeTool;
use App\Http\Common\Traits\HttpResponseTrait;
use App\Http\Requests\Auth\VerificationCode\StoreRequest;
use App\Http\Controllers\Controller;

class VerificationCodeController extends Controller
{
    use HttpResponseTrait;

    /**
     * 发送验证码
     * @param StoreRequest $request
     * @return \Symfony\Component\HttpFoundation\Response|\Illuminate\Contracts\Routing\ResponseFactory
     * @throws \App\Exceptions\VerificationCode\SendSmsException
     * @author:pyh
     * @time:2018/5/17
     */
	public function store(StoreRequest $request)
	{
	    VerificationCodeTool::sendSms($request->phone, $request->type);
	    return $this->responseSuccess();
	}
}
