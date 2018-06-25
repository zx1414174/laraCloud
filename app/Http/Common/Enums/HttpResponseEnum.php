<?php
/**
 * http code
 */
namespace App\Http\Common\Enums;


interface HttpResponseEnum
{
    # 成功返回码
    const SUCCESS = 200;
    # 错误返回码
    const ERROR = 400;
    # 没有绑定手机
    const NO_BIND_PHONE = 601;
    # 进行微信强制认证
    const WECHAT_SNSAPI_USERINFO = 413;
    # 返回code字段名
    const RESPONSE_CODE_FIELD_NAME = 'statusCode';
    # 返回信息字段名
    const RESPONSE_MESSAGE_FIELD_NAME = 'message';
    # 返回数据字段名
    const RESPONSE_DATA_FIELD_NAME = 'data';
}