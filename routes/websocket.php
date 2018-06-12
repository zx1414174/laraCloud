<?php

use Illuminate\Http\Request;
use SwooleTW\Http\Websocket\Facades\Websocket;

/*
|--------------------------------------------------------------------------
| Websocket Routes
|--------------------------------------------------------------------------
|
| Here is where you can register websocket events for your application.
|
*/

Websocket::on('connect', function ($websocket, Request $request) {
    // called while socket on connect
    $websocket->emit('message', 'welcome12312');
    echo 'asdfasd';
});

Websocket::on('close', function ($websocket) {
    $websocket->emit('message', '再见 swoole');
});

Websocket::on('request', function ($websocket, $data) {
    $websocket->emit('message', '你好 swoole');
    echo '1111';
});
Websocket::on('message', function ($websocket, $data) {
    $websocket->emit('message', '你好 swoole');
    echo '1111';
});

// Websocket::on('test', 'ExampleController@method');