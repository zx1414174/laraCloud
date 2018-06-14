<?php

namespace App\Http\Controllers\Chatroom;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ChatroomController extends Controller
{
    public function testUser()
    {
        return Auth::user();
    }
}
