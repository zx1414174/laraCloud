<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\VerificationCode\StoreRequest;
use App\Http\Controllers\Controller;
use App\Http\Tool\Sms\Ali\AliSms;

class VerificationCodeController extends Controller
{

	/**
	 * 发送验证码
	 * @param StoreRequest $request
     * @param AliSms $aliSms
     * @return \Symfony\Component\HttpFoundation\Response|\Illuminate\Contracts\Routing\ResponseFactory
	 * @author:pyh
	 * @time:2018/5/17
	 */
	public function store(StoreRequest $request, AliSms $aliSms)
	{
	    $aliSms->sendSms('SMS_135190170','13750528473',[
	        'code' => 3324
        ]);
	    return response()->json([
	       'success' => 'haha'
        ]);
	}
}
