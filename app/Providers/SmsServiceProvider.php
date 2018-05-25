<?php

namespace App\Providers;

use Aliyun\AliSms;
use Aliyun\Core\Config;
use Illuminate\Support\ServiceProvider;

class SmsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // 加载区域结点配置
        $this->app->singleton(AliSms::class,function ($app) {
            Config::load();
            return new AliSms();
        });
    }
}
