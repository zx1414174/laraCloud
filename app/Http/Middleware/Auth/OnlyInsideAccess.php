<?php

namespace App\Http\Middleware\Auth;

use App\Exceptions\Auth\AccessDeniedException;
use App\Http\Common\Tools\Common\InsideAccessTool;
use Closure;

class OnlyInsideAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next\
     * @throws \Exception
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!InsideAccessTool::checkAccessParamSign($request->all())) throw new AccessDeniedException();
        return $next($request);
    }
}
