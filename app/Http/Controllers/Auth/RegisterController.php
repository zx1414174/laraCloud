<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\VerificationCode\CodeErrorException;
use App\Http\Common\Actions\Token\GetPassportApiToken;
use App\Http\Common\Actions\User\CreateUser;
use App\Http\Common\Tools\Common\VerificationCodeTool;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Register\StoreRequest;
use App\Http\Common\Tools\Common\HttpResponse;
use Illuminate\Database\QueryException;
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
            VerificationCodeTool::checkCode($request->phone,'register',$request->verification_code);
            (new CreateUser())->execute($request->all());
            DB::commit();
            $token_data = (new GetPassportApiToken())->execute($request->phone, $request->password);
            return (new HttpResponse())->data($token_data);
        } catch (QueryException $exception) {
            DB::rollback();
            throw $exception;
        } catch (\Throwable $exception) {
            dd($exception);
            throw $exception;
        }
    }

}
