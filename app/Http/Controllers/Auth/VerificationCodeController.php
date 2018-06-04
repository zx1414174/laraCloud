<?php

namespace App\Http\Controllers\Auth;

use Aliyun\AliSms;
use App\Http\Requests\Auth\VerificationCode\StoreRequest;
use App\Http\Controllers\Controller;
use App\Http\Tool\Common\HttpResponse;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

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
	    $code = str_pad(mt_rand(1,99999),0,5,STR_PAD_LEFT);
	    $sms_result = $aliSms->sendSms('SMS_135190170',$request->phone,[
	        'code' => $code
        ]);
	    if ($sms_result && $sms_result->Code == 'OK') {
            Cache::put($request->phone,$code,Carbon::now()->addMinute(20));
        } else {
	        Log::error($sms_result);
            return (new HttpResponse())->error();
        }
        return (new HttpResponse())->success();
	}
}
