<?php

namespace App\Http\Controllers\Auth;

use App\Http\Action\Token\GetPassportApiToken;
use App\Http\Action\User\CreateUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Register\StoreRequest;
use App\Http\Tool\Common\HttpResponse;
use App\Model\User;
use GuzzleHttp\Client;
use Illuminate\Database\QueryException;
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
            (new CreateUser())->execute($request->all());
            DB::commit();
            $token_data = (new GetPassportApiToken())->execute($request->phone, $request->password);
            return (new HttpResponse())->data($token_data);
        } catch (QueryException $exception) {
            DB::rollback();
            throw $exception;
        } catch (\Throwable $exception) {
            throw $exception;
        }



    }

}
