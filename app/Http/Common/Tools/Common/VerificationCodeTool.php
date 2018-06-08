<?php
/**
 * 验证码工具类
 */

namespace App\Http\Common\Tools\Common;


use Aliyun\AliSms;
use App\Exceptions\VerificationCode\SendSmsException;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

class VerificationCodeTool
{
	public static function put($key, $type, $code)
	{
		Cache::tags([$type])->put($key,$code,Carbon::now()->addMinute(20));
	}
	public static function get($key, $type)
	{
		return Cache::tags([$type])->get($key);
	}

    /**
     * code生成
     * @param $type
     * @return string
     * @author:pyh
     * @time:2018/6/7
     */
	public static function makeCode($type)
    {
        $length = 6;
        if ($type == 'login') $length = 5;
        return str_pad(mt_rand(1,str_repeat(9,$length)),0,$length,STR_PAD_LEFT);
    }

    /**
     * 检测code是否正确
     * @param $key
     * @param $type
     * @param $code
     * @return bool
     * @author:pyh
     * @time:2018/6/7
     */
    public static function checkCode($key, $type, $code) : bool
    {
        $save_code = VerificationCodeTool::get($key, $type);
        if ($save_code && $save_code == $code) return true;
        return false;
    }

    /**
     * @param $phone
     * @param $type
     * @return bool
	 * @throws SendSmsException
     * @author:pyh
     * @time:2018/6/7
     */
    public static function sendSms($phone,$type) : bool
    {
		//测试不发送短信 默认 1111
		if (env('APP_DEBUG') == true) {
			VerificationCodeTool::put($phone, $type,'1111');
			return true;
		}
        $code = VerificationCodeTool::makeCode($type);
        $alisms = app(AliSms::class);
        $sms_result = $alisms->sendSms(env('ALI_SMS_VERIFICATION_CODE_TEMPLATE'),$phone,[
            'code' => $code
        ]);
        if ($sms_result && $sms_result->Code == 'OK') {
            VerificationCodeTool::put($phone, $type, $code);
            return true;
        }
       throw new SendSmsException();
    }

}