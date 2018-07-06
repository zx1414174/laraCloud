<?php

namespace App\Http\Controllers\Chatroom;

use App\Http\Common\Actions\User\HttpGetUser;
use App\Http\Controllers\Controller;
use SwooleTW\Http\Websocket\Facades\Websocket;

class ChatroomController extends Controller
{
    /**
     * 聊天室消息处理
     * @param $websocket
     * @param $data
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @author pyh
     * @time 2018/7/3
     */
    public function message($websocket, $data)
    {
        $user_arr = (new  HttpGetUser())->execute($data['authorization_token']);
        Websocket::emit("chatroom/message", 'hahaha');
    }

    public function viewDetail()
    {
        return view('chatroom.detail');
    }


}
