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
});

Websocket::on('message', function ($websocket, Request $request) {
    // called while socket on connect
    $websocket->emit('message', 'welcome12312');
});

Websocket::on('chatroom/message', \App\Http\Controllers\Chatroom\ChatroomController::class.'@message');