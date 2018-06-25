<?php

namespace App\Http\Controllers\Auth;

use App\Http\Common\Traits\HttpResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    use HttpResponseTrait;

    /**
     * 获取用户信息
     * @return \Illuminate\Http\JsonResponse
     * @author pyh
     * @time 2018/6/25
     */
    public function show()
    {
        return $this->responseData(Auth::user());
    }
}
