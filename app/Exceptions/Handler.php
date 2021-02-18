<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\DB;
use Throwable;
use Illuminate\Auth\AuthenticationException;

class Handler extends ExceptionHandler
{
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
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if (request()->expectsJson()) {
            return Response()->json(['error' => 'UnAuthorized'], 401); //exeption for api
        }

        $guard = data_get($exception->guards(), 0);
        switch ($guard) {
            case 'admin':
                $login = 'tenant.login';
                return redirect()->guest(route('tenant.login', ['subdomain' => request()->subdomain]));

                break;
            default:
                $login = 'login';
                break;
        }
        return redirect()->guest(route($login));
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        return parent::render($request, $exception);
    }
}
