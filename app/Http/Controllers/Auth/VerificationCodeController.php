<?php

namespace App\Http\Controllers\Auth;

use Aliyun\AliSms;
use App\Http\Common\Tools\Common\VerificationCodeTool;
use App\Http\Common\Traits\HttpResponseTrait;
use App\Http\Requests\Auth\VerificationCode\StoreRequest;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class VerificationCodeController extends Controller
{
    use HttpResponseTrait;

	/**
	 * 发送验证码
	 * @param StoreRequest $request
     * @return \Symfony\Component\HttpFoundation\Response|\Illuminate\Contracts\Routing\ResponseFactory
	 * @author:pyh
	 * @time:2018/5/17
	 */
	public function store(StoreRequest $request)
	{
	    VerificationCodeTool::sendSms($request->phone, $request->type);
	}
}
