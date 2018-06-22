<?php

namespace App\Http\Controllers\Chatroom;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use SwooleTW\Http\Websocket\Facades\Websocket;

class ChatroomController extends Controller
{
    public function testUser()
    {
        return Auth::user();
    }
    public function message($websocket, $data)
    {
        Websocket::broadcast()->emit('message', 'this is a test');
    }
}
