<?php

namespace App\Exceptions;

use App\Http\Common\Traits\HttpResponseTrait;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    use HttpResponseTrait;
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\JsonResponse
     */
    public function render($request, Exception $exception)
    {
    	if ($exception instanceof ValidationException) {
    	    return $this->responseMessage($exception->getMessage(),400);
		} elseif($exception instanceof NotFoundHttpException) {
    	    return $this->responseMessage('page not find',404);
        } else {
            return $this->responseMessage($exception->getMessage(),$exception->getCode());
        }
        return parent::render($request, $exception);
    }
}
