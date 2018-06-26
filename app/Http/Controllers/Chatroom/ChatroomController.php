<?php

namespace App\Http\Controllers\Chatroom;

use App\Http\Common\Actions\User\HttpGetUser;
use App\Http\Controllers\Controller;
use SwooleTW\Http\Websocket\Facades\Websocket;

class ChatroomController extends Controller
{
    public function message($websocket, $data)
    {
        $user_arr = (new  HttpGetUser())->execute($data['authorization_token']);
        Websocket::emit('data', json_encode($user_arr));
    }
}
