<?php
/**
 * 短信发送配置表
 */
return [
    'ali' => [
        'access_key_id' => env('ALI_SMS_ACCESS_KEY_ID'),
        'access_key_secret' => env('ALI_SMS_ACCESS_KEY_SECRET'),
        'sign' => env('ALI_SMS_SIGN'),
    ]
];