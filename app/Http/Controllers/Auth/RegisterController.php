<?php

namespace App\Http\Controllers\Auth;

use App\Http\Action\User\CreateUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Register\StoreRequest;
use App\Http\Tool\Common\HttpResponse;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * @param StoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     * @author:pyh
     * @time:2018/6/4
     */
    public function store(StoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $verification_code = Cache::get($request->phone);
            if ($request->verification_code !== $verification_code) {
                throw new \Exception('验证码错误',400);
            }
            $user_model = (new CreateUser())->execute($request->all());
            $http = new Client();
            DB::commit();
            return (new HttpResponse())->success();
        } catch (\Throwable $exception) {
            DB::rollback();
            throw $exception;
        }

    }

}
