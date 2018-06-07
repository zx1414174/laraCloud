<?php
/**
 * 内部接口调用 signature签名
 */
namespace App\Http\Common\Tools\Common;


use App\Exceptions\Common\ParameterErrorException;

class InsideAccessTool
{
    const SIGN_FIELD_NAME = 'sign';
    const EXPIRE_TIME_FIELD_NAME = 'expire_time';
    /**
     * 检测参数
     * @param array $param 请求参数
     * @param string $sign_field_name
     * @throws ParameterErrorException
     * @return bool
     * @author:pyh
     * @time:2018/6/2
     */
    public static function checkAccessParamSign($param, $sign_field_name = self::SIGN_FIELD_NAME)
    {
        if (!isset($param[$sign_field_name])) return false;
        $sign = $param[$sign_field_name];
        unset($param[$sign_field_name]);
        if (self::makeAccessParamSign($param) != $sign) return false;
        return true;
    }

    /**
     * @param $param
     * @param string $sign_field_name
     * @throws ParameterErrorException
     * @return string
     * @author:pyh
     * @time:2018/6/2
     */
    public static function makeAccessParamSign($param, $sign_field_name = self::SIGN_FIELD_NAME)
    {
        if (array_key_exists($sign_field_name, $param)) throw new ParameterErrorException();
        ksort($param);
        $param_str = '';
        foreach ($param as $key => $value) {
            if (is_array($value)) $value = json_encode($value);
            $param_str.= "&{$key}={$value}";
        }
        $param_str .= '&key='.env('INSIDE_SECRET_KEY');
        $param_str = ltrim($param_str,'&');
        return sha1($param_str);
    }

}