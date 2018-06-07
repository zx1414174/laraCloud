<?php
/**
 * 验证码工具类
 */

namespace App\Http\Tool\Common;


use Illuminate\Support\Facades\Cache;

class VerificationCodeTool
{
	public static function put($key, $type, $code)
	{
		Cache::tags([$type])->put($key,$code);
	}
	public static function get($key, $type, $code)
	{
		Cache::tags([$type])->put($key,$code);
	}

}