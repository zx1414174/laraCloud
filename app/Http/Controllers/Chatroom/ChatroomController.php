<?php

namespace App\Http\Controllers\Chatroom;

use App\Http\Common\Actions\User\HttpGetUser;
use App\Http\Controllers\Controller;
use App\Mail\TestMail;
use App\Model\User;
use Illuminate\Support\Facades\Mail;
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
//        $user_arr = (new  HttpGetUser())->execute($data['authorization_token']);
        Websocket::emit("chatroom/message",\GuzzleHttp\json_encode([
           'a' => 'hahah',
        ]));
    }

    public function viewDetail()
    {
        return view('chatroom.detail');
    }

    public function test()
    {
        Mail::to(User::query()->findOrFail(1))->send(new TestMail());
    }


}
